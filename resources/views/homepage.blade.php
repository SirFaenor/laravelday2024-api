
{{-- layout principale dell'applicazione --}}
@extends('layouts.base')

{{-- head --}}
@section('head_extra')
<title>{{__("homepage.meta_title")}}</title>
<meta name="description" content="{{__("homepage.meta_description")}}">
@include("components.css", ["href" => asset("css/build/homepage.css").'?v='.env("ASSETS_VERSION")])
@endsection

{{-- codice extra foot --}}
@section('foot_extra')
<script>
    
    
</script>
@endsection

{{-- Classe html per il tag <body> --}}
@section('namespace', "")

@section('content')
  


@endsection
