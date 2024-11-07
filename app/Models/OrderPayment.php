<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Model;

/**
 * Record relativo al pagamento di un ordine
 */
class OrderPayment extends Model
{
    protected $table = 'order_payments';

    protected $fillable = [
        'order_id',
        'method',
        'fee_amount',
        'subtotal',
        'total_amount',
        'status',
        'init_url',
        'back_url',
        'success_url',
        'confirmed_at',
    ];


    /**
     * @var array<string,string>
     */
    protected $casts = [
        "subtotal" => 'float',
        "fee_amount" => 'float',
        'total_amount' => 'float',
        'confirmed_at' => 'datetime'
    ];


    /**
     * Imposta pagamento completato
     */
    /* public function setComplete()
    {
        $this->stato = 'Completed';

        $this->save();

        $this->refresh();

        if($this->stato !== 'Completed') {
            throw new Exception("Set completed failed");
        }
    } */


}
