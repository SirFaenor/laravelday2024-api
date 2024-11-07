@extends('layouts.api')

@section('content')

<div class="cart cart-index">

@include('cart.partials.header', ['step' => 1])

<div class="mt-10 mx-auto menu container">
    <p class="text-center">Seleziona il numero di porzioni per ogni pietanza. Quando hai finito clicca su "Procedi"in basso</p>
    @if($errors->any())
    <div class="text-red border border-red px-4 py-3 rounded relative mt-10" role="alert" id="cart-errors">
        <strong class="font-bold">Attenzione!</strong>
        <ul class="mt-3 list-disc list-inside">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="post" action="{{ $submit_url }}" id="menu-form">
        <ul class="mt-10">
        @foreach($categories as $key => $category) 
            <li @class(['mt-10' => $key > 0])>
                

                @if($category->items->count())

                <table class="w-full table-fixed">
                    <thead>
                        <tr>
                            <th class="text-left w-[45%] lg:w-[50%] p-2 lg:p-6 font-500 text-xl text-red">{{ $category->getTranslation('name', $locale) }}</th>
                            <th class="text-left w-[15%] lg:w-[15%] p-2 lg:p-6 text-lg">Prezzo</th>
                            <th class="text-left w-[20%] lg:w-[20%] p-2 lg:p-6 text-lg">Quantità</th>
                            <th class="text-left w-[20%] lg:w-[15%] p-2 lg:p-6 text-lg">Subtotale</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($category->items as $menuItem)
                        <tr class="odd:bg-gray cart-item">
                            <td class="p-2 lg:p-4 leading-none">
                                <h5 class="text-md lg:text-lg ">{{ $menuItem->getTranslation('title', $locale) }}</h5>
                                <span class="text-sm">{{ $menuItem->getTranslation('subtitle', $locale) ?: '-' }} </span>
                            </td>
                            <td class="p-2 lg:p-4 text-md lg:text-lg">
                                {{ $menuItem->price }} €
                            </td>
                            <td class="p-2 lg:p-4 text-lg lg:text-xl">
                                <label class="sr-only">Quantità</label>
                                <input
                                type="number"
                                inputmode="numeric"
                                autocomplete="off"
                                class="quantity-input max-w-[5em] w-full bg-transparent placeholder:text-slate-400 text-slate-700 border border-slate-200 px-3 py-2 focus:shadow"
                                maxlength="5"
                                id="quantity_{{ $menuItem->id }}"
                                name="quantity[{{ $menuItem->id }}]"
                                data-price="{{ $menuItem->price }}"
                                value="{{ $selected[$menuItem->id] ?? 0 }}"
                                min="0"
                                />
                            </td>
                            <td class="p-2 lg:p-4 text-md lg:text-lg">
                                <input
                                readonly
                                inputmode="numeric"
                                autocomplete="off"
                                class="subtotal max-w-[5em] w-full bg-transparent placeholder:text-slate-400 text-slate-700 border border-slate-200 px-3 py-2 focus:shadow"
                                maxlength="5"
                                id="subtotal_{{ $menuItem->id }}"
                                name="subtotal[{{ $menuItem->id }}]"
                                value="{{ number_format( ($selected[$menuItem->id] ?? 0) * $menuItem->price, 2, '.', '') }}"
                                >
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </li>

        @endforeach
        </ul>
    </form>
</div>
<div class="flex justify-end mt-10 mx-auto container">
    <div class="text-right bg-gray p-2 lg:p-6  lg:w-[50%]">
        
        <h6 class="w-full text-2xl font-500 text-blue flex justify-between align-center">
            <span>{{__('cart.index.total')}}</span>
            <span>
                <span class="ml-10 cart-total">{{ $total > 0 ? $total.' €' : '-' }}</span> 
            </span> 
        </h6>
         
        <x-form.submit :label="__('cart.index.submit')" form="menu-form"  />
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

