<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Rappresenta un carrello
 * inizializzato da app main
 */
class Cart extends Model
{
    /**
     * @var array<int,string>
     */
    protected $fillable = [
        'cart_uuid',
        'product_ids',
    ];


    /**
     * La lista dei prodotti nel carrello product_id => quantità
     * @var array<string,string>
     */
    protected $casts = [
        'product_ids' => 'array',
    ];

}
