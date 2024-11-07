<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use Illuminate\Http\Request;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\Order as OrderResource;
use App\Http\Resources\OrderCollection;
use App\Services\OrderService;

class OrderController extends Controller
{
    /**
     * Ritorna lista degli ordini
     */
    public function index(Request $request): OrderCollection
    {
        // .... validazione e considerazione di eventuali filtri di ricerca ... ///

        // recuper degli ordini
        $orders = Order::with('items.menuItem')->orderBy('created_at')->get();

        return new OrderCollection($orders);

    }


    /**
     * Mostra il dettaglio di un singolo ordine
     * (scansione del qrcode in loco)
     */
    public function show(Order $order): OrderResource
    {
        return new OrderResource($order);
    }


    /**
     * Evade un ordine
     */
    public function fulfill(Request $request, Order $order, OrderService $orderService): OrderResource
    {
        // lasciamo al service il controllo sullo stato attuale dell'ordine
        $orderService->fulfill($order);

        return new OrderResource($order);

    }



    /**
     * Genera un qr code per un dato id ordine
     * @see https://www.simplesoftware.io/#/docs/simple-qrcode
     * Restituisce svg o data per image a seconda del formato passato
     */
    public function qrCode(Order $order): string
    {

        /**
         * Genero qr code
         */
        $options = new QROptions([
            'version' => 10,
            'outputType' => QRCode::OUTPUT_IMAGE_PNG,
            'eccLevel' => QRCode::ECC_H,
            'scale' => 3,
            'imageBase64' => false,
        ]);
        $string = (new QRCode($options))->render($order->code);


        /**
         * Risposta
         */
        return $string;

    }


}
