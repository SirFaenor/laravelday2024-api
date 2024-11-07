<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Singola riga in ordine
 */
class OrderItem extends Model
{
    protected $table = 'order_items';

    protected $fillable = [
        'order_id',
        'menu_id',
        'quantity',
        'unit_price',
        'subtotal'
    ];

    protected $casts = [
        'unit_price' => 'float',
        'subtotal' => 'float',
        'quantity' => 'int'
    ];


    /**
     * Prodotto originario in menu
     * @return BelongsTo<Menu,$this>
     */
    public function menuItem(): BelongsTo
    {
        return $this->belongsTo(Menu::class, "menu_id");
    }

}
