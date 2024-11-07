<?php

namespace App\Http\Controllers\Api;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Notifications\OrderConfirmed;
use App\Services\PaymentService;
use Illuminate\Support\Facades\Notification;

/**
 * Verifica lo stato del pagamento
 */
class PaymentController extends Controller
{
    /**
     * Chiamata al rientro dal pagamento.
     * Inoltra la richiesta alle api di pagamento,
     * se il pagamento è andato a buon fine
     * imposta l'ordine come pagato
     */
    public function verify(Request $request, Cart $cart, Order $order, PaymentService $paymentService): JsonResponse
    {

        /**
         * Validazione
         */
        try {
            $this->validate($request, [

                // hash dell'ordine
                'order_hash' => ['required', 'string', function ($attribute, $value, $fail) use ($order) {

                    if ($order->checkHash($value) === false) {
                        $fail('Invalid hash');
                    }

                }],

                'cart_id' => function ($attribute, $value, $fail) use ($order, $cart) {
                    if ($order->cart_id !== $cart->id) {
                        $fail('Invalid cart');
                    }
                },

            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => $e->errors(),
            ], 422);
        }



        /**
         * Verifico pagamento tramite gateway
         * .... verifica pagamento, suppongo sia ok.....
         * Se il pagamento non è andato a buon fine,
         * ritorneremmo uno stato diverso da 200 e la chiamata
         * api andrà in errore.
         */


        /**
         * Aggiornamento ordine
         */
        $order = $paymentService->confirmPayment($order);


        ray($order)->color('blue')->label('Pagamento verificato');


        /**
         * Invio conferma ordine
         */
        Notification::route('mail', $order->customer_email)->notify(
            (new OrderConfirmed($order))->locale(app()->getLocale())
        );


        return response()->json([
            'message' => 'Order paid',
            'order' => $order,
            'cart_id' => $order->cart->id,
        ], 200);
    }

}
