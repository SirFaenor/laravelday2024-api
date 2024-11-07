<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Rappresenta un elemento id un ordine come ritornato
 * dalle api
 */
class OrderItem extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string,mixed>
     */
    public function toArray(Request $request)
    {
        return [
            'code' => $this->menuItem->code,
            'title' => $this->menuItem->title,
            'quantity' => $this->quantity,
            'unit_price' => $this->unit_price,
            'subtotal' => $this->subtotal,
        ];

    }

}
