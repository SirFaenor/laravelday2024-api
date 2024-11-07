<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Menu;
use App\Models\Order;

/**
 * Servizio per la gestione degli ordini
 */
class OrderService
{
    public function __construct()
    {
        //
    }

    /**
     * Crea un ordine
     * @param Cart $cart carrello che ha generato l'ordine
     * @param string $customerEmail email del cliente
     */
    public function createOrder(Cart $cart, string $customerEmail): Order
    {
        // Creo l'ordine
        $order = new Order();
        $order->cart_id = $cart->id;
        $order->code = uniqid(); // da validare su db
        $order->customer_email = $customerEmail;
        $order->subtotal = $cart->total;
        $order->save();

        // eager load dei prodotti
        $items = Menu::whereIn('id', array_keys($cart->product_ids))->get();


        // Creo i dettagli dell'ordine
        foreach ($cart->product_ids as $itemId => $quantity) {
            $order->items()->create([
                'menu_id' => $itemId,
                'quantity' => $quantity,
                'unit_price' => $items->find($itemId)->price,
                'subtotal' => $items->find($itemId)->price * $quantity
            ]);
        }

        return $order;
    }



    /**
     * Evade ordine
     */
    public function fulfill(Order $order): Order
    {
        if ($order->isFulfilled()) {
            throw new \Exception("Ordine già evaso");
        }

        $order->status = 'fulfilled';
        $order->save();

        return $order;
    }
}
