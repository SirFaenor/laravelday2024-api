@extends('layouts.api')

@section('content')
<div class="cart cart-form">

@include('cart.partials.header', ['step' => 2])

<section class="mt-10 mx-auto menu container max-w-screen-md">
    @if($errors->any())
    <div class="text-red border border-red px-4 py-3 rounded relative my-10" role="alert" id="cart-errors">
        <strong class="font-bold">Attenzione!</strong>
        <ul class="mt-3 list-disc list-inside">
            @foreach($errors->all() as $error)
            <li class="first-letter:uppercase">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form id="user-form" action="{{ $submit_url }}" method="post">
        <h2 class="text-xl font-500">{{__('cart.user_form.title')}}</h2>
        <div class="md:flex flex-wrap w-full">
            <div class="md:w-1/2 md:pr-4 mt-4">
                <x-form.input-text :label="__('validation.attributes.email')" name="email" required :value="$old['email'] ?? ''" />
            </div>
            <div class="md:w-1/2 md:pl-4 mt-4">
                <x-form.input-text :label="__('validation.attributes.email_confirmation')" name="email_confirmation" required :value="$old['email_confirmation'] ?? ''" />
            </div>
            <div class="w-full mt-6">
                <x-form.input-checkbox :label="__('cart.user_form.accept_tos')" name="accept_tos"  required  :checked="$old['accept_tos'] ?? false" />
            </div>
            <div class="w-full mt-4">
                <x-form.input-checkbox :label="__('cart.user_form.accept_privacy')" name="accept_privacy" required :checked="$old['accept_privacy'] ?? false" />
            </div>
            <div class="w-full mt-8 text-xs">
                * {{__('validation.required', ['attribute' => ''])}}
            </div>

        </div>
    </form>

    <div class="flex justify-end mt-10 mx-auto">
        <div class="text-right bg-gray p-2 lg:p-6 w-full">
            
            <h6 class="w-full text-2xl font-500 text-blue flex justify-between align-center">
                <span>{{__('cart.index.total')}}</span>
                <span>
                    <span class="ml-10 cart-total">{{ $total }}</span> €
                </span>
            </h6>
             
            <x-form.submit :label="__('cart.user_form.submit')" form="user-form"  />
        </div>
    </div>

</section>

</div>
@endsection

@push('scripts')
