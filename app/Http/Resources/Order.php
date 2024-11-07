<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Order extends JsonResource
{
    /**
     * Transform the resource into an array.
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'code' => $this->code,
            'hash' => $this->hash,
            "customer_email" => $this->customer_mail,
            'status' => $this->status,
            'payment_status' => $this->payment?->status,
            'date' => $this->payment?->confirmed_at,
            'subtotal' => $this->payment?->subtotal,
            'fee_amount' => $this->payment?->fee_amount,
            'total_amount' => $this->payment?->total_amount,
            'items' => OrderItem::collection($this->items),
        ];

    }


}
