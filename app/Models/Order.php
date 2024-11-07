<?php

namespace App\Models;

use App\Models\OrderPayment;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 */
class Order extends Model
{
    /**
     * Crea hash al momento del salvataggio
     */
    protected static function booted()
    {
        static::created(function (self $model) {
            $model->hash = Hash::make($model->id.$model->code.$model->customer_email);
            $model->save();
        });
    }

    /**
     * Controlla hash con uno dato
     */
    public function checkHash(string $hash): bool
    {
        return
            Hash::check($this->id.$this->code.$this->customer_email, $hash)
            &&
            $this->hash === $hash;
        ;
    }


    /**
     * Voci in ordine
     * @return HasMany<\App\Models\OrderItem,$this>
     */
    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }


    /**
     * Pagamento
     * @return HasOne<\App\Models\OrderPayment,$this>
     */
    public function payment(): HasOne
    {
        return $this->hasOne(OrderPayment::class, 'order_id', 'id');
    }


    /**
     * Carrello da cui è stato generato l'ordine
     * @return BelongsTo<\App\Models\Cart,$this>
     */
    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class, 'cart_id', 'id');
    }


    /**
     * Controllo status pagato
     */
    public function isPaid(): bool
    {
        return $this->status == 'paid';
    }

    /**
     * Controllo status completato
     */
    public function isFulfilled(): bool
    {
        return $this->status == 'fulfilled';
    }



}
