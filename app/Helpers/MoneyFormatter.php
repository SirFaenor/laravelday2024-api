<?php

namespace App\Helpers;

use Exception;

/**
 * Classe di utilità per svolgere calcoli ricorrenti
 *
 */
class MoneyFormatter
{
    /**
     * Valuta corrente
     */
    protected string $currency;

    /**
     * @const float DEFAULT_VAT valore predefinito dell'iva sovrascrivibile da esterno
     */
    public const DEFAULT_VAT = 22.00;

    /**
     * Valute disponibili
     * @const array $availableCurrencies
     */
    public const AVAILABLE_CURRENCIES = [
        "EUR" => "€"
       ,"USD" => "$"
    ];


    /**
     * @param string $currency valuta
     */
    public function __construct(string $currency)
    {
        $this->currency = $currency;
    }


    /**
     * Formattazione prezzi, comprensivi di indicatore valuta
     * @param float $price numero da formattare in notazione float
     * @param int|null $symbolPosition or int 1/2 posizione del simbolo valuta ( 1 a sx, 2 a dx, null lo sopprime )
     */
    public function formatPrice(float $price, ?int $symbolPosition = 1, string $ifZero = null): string
    {

        if ($ifZero !== null && $price == 0) {
            return $ifZero;
        }

        // formattazione
        switch ($this->currency) {
            case 'EUR':

                $price = number_format($price, 2, $dec_point = ',', $thousands_sep = '');

                break;

            case 'USD':

                $price = number_format($price, 2, $dec_point = '.', $thousands_sep = ',');

                break;

        }

        // aggiunta simbolo
        if ($symbolPosition === 1) {
            $price = $this->getCurrencySymbol().' '.$price;
        }

        if ($symbolPosition === 2) {
            $price .= ' '.$this->getCurrencySymbol();
        }


        return $price;

    }


    /**
     * Ritorna simbolo della valuta
     */
    public function getCurrencySymbol(): string
    {
        return self::AVAILABLE_CURRENCIES[$this->currency];
    }

}
