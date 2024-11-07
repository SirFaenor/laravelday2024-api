<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

/**
 * Genera l'html per la thank you page
 * di un dato ordine
 */
class ThankYouPageController extends Controller
{
    public function showOrder(Request $request, Order $order): JsonResponse
    {

        /**
         * Validazione
         */
        try {
            $this->validate($request, [

                'locale' => ['required', 'string', 'in:it,en'],

                // id dell'ordine
                'order_hash' => ['required', 'string', function ($attribute, $value, $fail) use ($order) {

                    if ($order->checkHash($value) === false) {
                        $fail('Invalid hash');
                    }

                }],

            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => $e->errors(),
            ], 400);
        }


        /**
         * Se l'ordine non è stato pagato, non posso mostrare la thank you page
         */
        if ($order->isPaid() === false) {
            return response()->json([
                'message' => 'Order not paid',
            ], 400);
        }

        ray($order)->label('Thank you page generata')->color('blue');



        return response()->json([
            'html' => view('cart.thank-you', [
                'order' => $order,
            ])->render(),
            'meta_title' => __('cart.typ.title'),
        ]);
    }
}
