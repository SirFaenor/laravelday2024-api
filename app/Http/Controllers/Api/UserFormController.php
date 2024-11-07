<?php

namespace App\Http\Controllers\Api;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\OrderService;
use App\Services\PaymentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\MessageBag;
use App\Http\Controllers\Controller;

/**
 * Crea form per dati utente e ne gestisce il submit.
 * Al submit crea un ordine.
 */
class UserFormController extends Controller
{
    /**
     *
     * /cart/form?locale={locale}
     * Restituisce html per la pagina del form dati utente
     *
     */
    public function index(Request $request, Cart $cart): JsonResponse
    {
        /**
         * Il carrello non deve avere già generato un ordine
         */
        if (Order::where('cart_id', $cart->id)->exists()) {
            abort(500, 'Cart already converted to order');
        }


        /**
         * Validazione base, se qualcosa va male qui
         * ritorno un responso con codice 422
         */
        try {
            $validated = $request->validate([

                'locale' => ['required', 'string', 'in:it,en'],

                // url da mandare in output per action del form
                'submit_url' => ['required', 'string'],

                // errori di validazione precedenti
                'submit-errors' => ['nullable', 'array'],

                // input precedente
                'old' => ['nullable', 'array'],
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {

            return response()->json([
                'message' => $e->errors()
            ], 422);

        }


        app()->setLocale($validated['locale']);


        ray($cart)->label('Creata pagina form')->color('blue');


        /**
         * Valorizzo old input
         */
        $old = $validated['old'] ?? [];

        /**
         * Ok
         */
        return response()->json([
            'html' => view("cart.form", [
                'locale' => $validated['locale'] ?? 'it',
                'total' => $cart->total,
                'submit_url' => $validated['submit_url'] ?? '',
                // se ho errori di validazione li passo alla view
                'errors' => new MessageBag($validated['submit-errors'] ?? []),
                'old' => $old,
            ])->render(),
            'meta_title' => __('cart.user_form.title'),
        ]);
    }


    /**
     * Submit del form utente.
     * Crea ordine una volta validati i dati.
     */
    public function submit(Request $request, Cart $cart, OrderService $orderService, PaymentService $paymentService): JsonResponse
    {
        /**
         * Il carrello non deve avere già generato un ordine
         */
        if (Order::where('cart_id', $cart->id)->exists()) {
            abort(500, 'Cart already converted to order');
        }

        /**
         * Validazione
         */
        try {
            $validated = $this->validate($request, [
                'locale' => ['required', 'string', 'in:it,en'],
                'email' => ['required', 'email', 'confirmed'],
                'accept_tos' => ['accepted'],
                'accept_privacy' => ['accepted'],

                // url a cui reindirizzare l'utente dopo il pagamento, sull'applicazione principale
                'success_url' => ['required', 'string', 'url'],

            ], [
                'accept_tos.accepted' => __('validation.tos_accepted'),
                'accept_privacy.accepted' => __('validation.privacy_accepted'),
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => $e->errors(),
                'old' => $request->all()
            ], 422);
        }

        app()->setLocale($validated['locale'] ?? 'it');


        /**
         * Crea ordine
         */
        $order = $orderService->createOrder($cart, $validated['email']);
        ray($order)->color('blue')->label('Ordine creato');


        /**
         * Inizializza pagamento
         */
        $payment = $paymentService->initPayment($order, $validated['success_url']);
        ray($payment)->color('blue')->label('Pagamento inizializzato');

        /**
         * OK
         * Restituisco url esterno per gateway di pagamento
         */
        return response()->json([
            'order_id' => $order->id,
            'order_code' => $order->code,
            'hash' => $order->hash,
            // l'applicazione principale deve reindirizzare l'utente a questo url
            'redirect_url' => $payment->init_url
        ], 200);
    }

}
