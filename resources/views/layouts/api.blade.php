{{-- 
-------------------------------------------------
Layout base per responsi html da API
-------------------------------------------------
--}}

{{-- $baseStyle è fornito da ViewServiceProvider --}}
<style>
    {{ $baseStyle }}    
</style>

{{-- 
Il selettore .api-response è  (v. tailwind.config.js):
- un layer di isolamento per gli stili di Preflight in tailwindcss
- un selettore che aumenta specificità per tutte le classi tailwindcss
--}}
<div class="api-response">
    @section('content')
    @show
</div>

@stack('scripts')
