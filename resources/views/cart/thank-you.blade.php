@inject('money', \App\Helpers\MoneyFormatter::class)

@extends('layouts.api')

@section('content')

<div class="cart cart-typ">

@include('cart.partials.header', ['step' => 3])

    <div class="mt-10 mx-auto container">
        
        <div class="mx-auto md:max-w-[80%] text-md">

            <h1 class="text-blue text-center text-2xl font-500">{{__('cart.typ.title')}}</h1>

            <p class="text-center text-lg mt-4">{{__('cart.typ.intro')}}</p>


            <div class="mt-10">
                @foreach($order->items as $line)
                <div class="odd:bg-neutral-100  flex flex-wrap justify-between py-4 px-2 border-t">
                    <p class="w-full md:w-[40%] font-500">{{ $line->menuItem->title }}</p>
                    <p class="w-1/3 md:w-[20%] md:text-right">{{ $money->formatPrice($line->unit_price,2 ) }}</p>
                    <p class="w-1/3 md:w-[20%] text-right">qt: {{ $line->quantity }}</p>
                    <p class="w-1/3 md:w-[20%] text-right">{{ $money->formatPrice($line->subtotal, 2) }}</p>
                </div>
                @endforeach
            </div>

            <div>
                <div class="odd:bg-neutral-100 flex justify-between py-2 px-2 border-t last:border-b ">
                    <p class="w-full md:w-[80%] md:text-right font-500"">{{__('cart.index.subtotal')}}</p>
                    <p class="w-1/3 md:w-[20%] text-right">{{ $money->formatPrice($order->subtotal, 2) }}</p>
                </div>
                @if($order->payment->fee_amount > 0)
                <div class="odd:bg-neutral-100 flex justify-between py-2 px-2  border-t last:border-b ">
                    <p class="w-full md:w-[80%] md:text-right font-500">{{__('cart.index.payment_fee_amount')}}</p>
                    <p class="w-1/3 md:w-[20%] text-right">{{ $money->formatPrice($order->payment->fee_amount, 2) }}</p>
                </div>
                @endif
                <div class="odd:bg-neutral-100 flex justify-between py-2 px-2  border-t last:border-b ">
                    <p class="w-full md:w-[80%] md:text-right font-500 text-lg uppercase">{{__('cart.index.total_amount')}}</p>
                    <p class="w-1/3 md:w-[20%] text-right">{{ $money->formatPrice($order->payment->total_amount, 2) }}</p>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection

@push('scripts')
{{-- 
Recuperiamo l'asset direttamente qui
(alternativa alla fornitura da parte di un composer, v. ViewServiceProvider e api.blade)
--}}
<script>
{{  new \Illuminate\Support\HtmlString(\Illuminate\Support\Facades\Vite::content('resources/js/menu.js')) }}
</script>
@endpush

