<!doctype html>
<html class="no-js" lang="{{str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/x-icon" href="{{asset("img/favicon.png")}}" />
{{-- 
    javascript di boot 
    Sorgente in resources/js/boot.js, viene compilato in public/js/build.
    Includerlo inline se si vuole ottimizzare test di performance    

--}}{{-- <script>
(LoaderManager=function e(){var r=[],n=!0;return e.addEvent=function(a){return 0==n&&e.start(),a&&-1==r.indexOf(a)&&r.push(a),e},e.eventComplete=function(a){return a&&r.indexOf(a)>=0&&r.splice(r.indexOf(a),1),r.length||(n=!1,e.stop()),e},e.start=function(){return e.onStart()},e.stop=function(){return e.messageClear(),e.progressBarClear(),e.onStop()},e.progressBar=function(){return e.progressBarClear(),$('<div class="loadermanager-progress"><div class="loadermanager-progressbar"></div></div>').appendTo("body"),e},e.progressBarUpdate=function(r){return $("body").find(".loadermanager-progressbar").width(r+"%"),e},e.progressBarClear=function(){return $("body").find(".loadermanager-progress").remove(),e},e.message=function(r){return e.messageClear(),$('<div class="loadermanager-dialog">'+r+"</div>").prependTo("html"),e},e.messageClear=function(){return $("html").find(".loadermanager-dialog").remove(),e},e.onStart=function(){return $("html").removeClass("loadermanager-page_loaded"),e},e.onStop=function(){$("html").removeClass("page_loading").addClass("loadermanager-page_loaded"),$(document).trigger("loadermanager-page_loaded")},e})(),LoaderManager.addEvent("site_loading"),document.documentElement.classList.add("js"),document.documentElement.classList.remove("no-js"),document.documentElement.classList.add("no-touch"),window.addEventListener("touchstart",(function(){document.documentElement.classList.add("touch"),document.documentElement.classList.remove("no-touch")}));
</script> --}}
<script src="{{asset("js/build/boot.js").'?v='.env("ASSETS_VERSION")}}"></script>
{{--
    css di boot 
    Sorgente in resources/sass/boot.scss, viene compilato in public/css/build.
    Includerlo inline se si vuole ottimizzare test di performance    
--}}
{{-- <style>
html.js:not(.loadermanager-page_loaded):before{width:100%;height:100%;background:#ccc;display:block;content:'';z-index:1000;position:fixed;left:0;top:0}html.js:not(.loadermanager-page_loaded):after{width:100%;height:100%;content:'';z-index:1001;position:fixed;left:0;top:0;background:url(/img/logo.svg) center center/10vw auto no-repeat;-webkit-animation:loaderPulse 2s infinite linear;animation:loaderPulse 2s infinite linear}@-webkit-keyframes loaderPulse{0%{opacity:0}50%{opacity:1}to{opacity:0}}@keyframes loaderPulse{0%{opacity:0}50%{opacity:1}to{opacity:0}}html.js.loadermanager-page_loaded:before{-webkit-animation:loaderFadeOut 1s;animation:loaderFadeOut 1s;-webkit-animation-direction:normal;animation-direction:normal;-webkit-animation-fill-mode:forwards;animation-fill-mode:forwards;-webkit-animation-iteration-count:once;animation-iteration-count:once}@-webkit-keyframes loaderFadeOut{0%{opacity:1}98%{opacity:0}99%{opacity:0;z-index:0}to{opacity:0;z-index:-1}}@keyframes loaderFadeOut{0%{opacity:1}98%{opacity:0}99%{opacity:0;z-index:0}to{opacity:0;z-index:-1}}html.js.loadermanager-page_loaded:after{display:none}
</style> --}}
@include("components.css", ["href" => asset("css/build/boot.css").'?v='.env("ASSETS_VERSION"), "defer" => false])
{{-- 
    altri css
    Di default, vengono deferiti (v. boot.js e app.js)
--}}
@include("components.css", ["href" => asset("css/build/main.css").'?v='.env("ASSETS_VERSION")])
{{-- hook per blade figlie, per inserire codice/script/link custom aggiuntivi nell'head --}}
@yield('head_extra') 
{{-- 
    alternates
    La variabile deve essere disponibile in questo punto.
    Viene valorizzata di default in AppServiceProvider, sovrascriverla
    nella blade specifica al bisogno.    
--}}
@isset($alternates)
@foreach ($alternates as $lgTag => $url)
@if($url)
<link rel="alternate" href="{{$url}}" hrefLang="{{$lgTag}}" />
@endif
@endforeach
@endisset

<!-- Global site tag (gtag.js) - Google Analytics -->
@if(config("app.env") == 'production')
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-xxxxxxx-x"></script>
<script>
  window.GA_MEASUREMENT_ID = 'UA-xxxxxxx-x';
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', GA_MEASUREMENT_ID);
</script>
@endif
</head>
<body data-namespace="@yield('namespace', $active_route)" data-barba="wrapper">
<div id="main-wrapper">

    <header id="page_header" style="z-index: 980;" uk-sticky="show-on-up: true; animation: uk-animation-slide-top; bottom: #bottom">
        
        <div class="uk-container uk-flex uk-flex-between uk-flex-wrap top">

            <h2 class="logo uk-margin-top"><a href="/it/"><img src="{{ asset("img/logo.svg") }}" alt="Logo" width="100"></a></h2>

            <div class="uk-width-auto">
                <nav class="uk-navbar-container uk-navbar-transparent" uk-navbar>
                    <div class="uk-navbar-left">
                        <ul class="uk-navbar-nav" id="page_header-mainmenu">
                            <li @if($active_route == "homepage") class="uk-active" @endif data-namespace="homepage"><a href="{{route("homepage")}}">Homepage</a></li>
                            <li @if($active_route == "news") class="uk-active" @endif data-namespace="news"><a href="{{route("news")}}">News</a></li>
                            <li @if($active_route == "contatti") class="uk-active" @endif data-namespace="contatti"><a href="{{route("contatti")}}">{{__('global.contatti')}}</a></li>
                            <li><a data-barba-prevent href="/esempi/indice">esempi</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

    </header>

    <div id="page_content" class="uk-container uk-margin-top">
        {{-- contenuto da layout figlio --}}
        @yield('content')
    </div>

    <div id="page_footer" class="uk-container uk-margin">
        <div class="uk-grid uk-flex-between uk-flex-bottom" uk-grid>

            <p>
                {{config("site.company.name")}} | {{config("site.company.data_1")}} <br>
                {{config("site.company.phone")}} | {{config("site.company.mail")}}
            </p>
            
            <p data-barba-prevent="all">
                <a href="{{route('cookies')}}">Cookies</a>
                | <a href="{{route('privacy')}}">{{__('global.privacy')}}</a> 
                | <a href="{{route('sitemap')}}">{{__('global.sitemap')}}</a> 
                | <a href="{{route('legal')}}">{{__('global.legal')}}</a> 
                | <a href="/admin">admin</a> 
            </p>
        </div>
    </div>

    <div id="page_loader"></div>
</div><!-- main-wrapper -->


{{-- js vendor, sorgente in resources/js/vendor.js --}}
<script src="{{asset("js/build/vendor.js").'?v='.env("ASSETS_VERSION")}}" type="text/javascript"></script>

{{-- barba, rimuovere se non viene usato (v. app.js) --}}
<script src="https://cdn.jsdelivr.net/npm/@barba/core"></script>

{{-- gsap base --}}
<script src="{{asset("js/src/vendor/gsap/minified/gsap.min.js")}}"></script>

{{-- js main --}}
<script src="{{asset("js/build/app.js").'?v='.env("ASSETS_VERSION")}}" type="text/javascript"></script>

@yield('foot_extra') {{-- hook per blade figlie, per inserire js custom aggiuntivo posticipato --}}
@stack('scripts_extra')
</body>
</html>
