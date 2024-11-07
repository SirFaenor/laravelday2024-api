@inject('money', \App\Helpers\MoneyFormatter::class)

<x-mail::message>
# {{ __('mail.order_confirmation.title', [
    'code' => $order->code,
    'date' => $order->payment->confirmed_at->timezone('Europe/Rome')->format('d/m/Y H:i')
]) }}
# {{ __('mail.order_confirmation.subtitle', [
    'code' => $order->code,
    'date' => $order->payment->confirmed_at->timezone('Europe/Rome')->format('d/m/Y H:i')
]) }}
<br>

{{ __('mail.order_confirmation.intro_line_1') }}   
{{ __('mail.order_confirmation.intro_line_2') }}

<br>

{{-- Qr --}}
<img class="qrcode" src="{{ config('app.url').route('orders.qrcode', [$order->code], false) }}" width="200" height="auto">

{{-- <br>

<strong>{{ __('cart.order.code') }}</strong>   
{{ $order->code }} / {{ $order->payment->confirmed_at->timezone('Europe/Rome')->format('d/m/Y H:i') }}--}}
<br> 

{{-- riepilogo ordine --}}
<strong>{{ __('mail.order_confirmation.summary') }}</strong>     
@foreach ($order->items as $line)
{{ $line->menuItem->getTranslation('title', $locale) }} {{ $money->formatPrice($line->unit_price) }} x {{ $line->quantity }} = {{ $money->formatPrice($line->subtotal) }}   
@endforeach

{{-- totale --}}
<strong>{{ __('cart.index.subtotal') }}</strong>   
{{ $money->formatPrice($order->subtotal) }}

{{-- payment fee --}}
@if($order->payment->fee_amount > 0)
<strong>{{ __('cart.index.payment_fee_amount') }}</strong>   
{{ $money->formatPrice($order->payment->fee_amount) }}
@endif

{{-- payment fee --}}

<strong>{{ __('cart.index.total_amount') }}</strong>   
{{ $money->formatPrice($order->payment->total_amount) }}
<br>


{{-- <x-mail::button :url="''">
Button Text
</x-mail::button> --}}

{{ __('mail.thanks')}},<br>
{{ config('app.name') }}
</x-mail::message>

<style>
.qrcode {
    display: block;
    margin: 0 auto;
}
</style>