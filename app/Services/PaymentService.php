<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderPayment;
use Illuminate\Support\Facades\Hash;

/**
 * Servizio per la gestione dei pagamenti
 */
class PaymentService
{
    public function __construct()
    {
        //
    }

    /**
     * Inizializza pagamento
     * @param Order $order Ordine da pagare
     * @param string $successUrl url finale di procedura d'acquisto, sull'applicazione principale
     */
    public function initPayment(Order $order, string $successUrl): OrderPayment
    {


        // .... metodo di pagamento variabile ed eventuale fee_amount....
        $feeAmount = rand(2, 4);

        // ... comunicazione con gateway, inizializzazione pagamento e ottenimento url di init

        // ... generazione url di rientro in caso di errore...


        // Creo pagamento
        $payment = $order->payment()->create([
            'status' => 'pending',
            'method' => 'paypal',
            'subtotal' => $order->subtotal,
            'fee_amount' => $feeAmount,
            'total_amount' => $feeAmount + $order->subtotal,

            // url di pagamento su gateway esterno
            'init_url' => config('app.url').route('payment.init', [
                // questo è solo per assecondare il mock
                'r' => $this->generateSuccessUrl($order, $successUrl),
            ], false),

            // url di ritorno dopo pagamento completato
            'success_url' => $this->generateSuccessUrl($order, $successUrl),
        ]);


        return $payment;
    }

    /**
     * Genera url di redirect per rientro dal pagamento.
     */
    protected function generateSuccessUrl(Order $order, string $baseUri): string
    {
        return $baseUri.'?'.http_build_query([
            'order_code' => $order->code,
            'hash' => $order->hash,
        ]);
    }


    /**
     * Conferma pagamento di un ordine
     */
    public function confirmPayment(Order $order): Order
    {
        $order->status = 'paid';
        $order->save();

        $order->payment()->update([
            'status' => 'paid',
            'confirmed_at' => now(),
        ]);

        return $order;
    }


}
