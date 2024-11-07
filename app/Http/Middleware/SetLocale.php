<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cookie;

/**
 * Imposta localizzazione
 */
class SetLocale
{
    public function handle($request, Closure $next)
    {

        $availableLocales = app()->LangManager->getLocales();

        // lcoale da cartella url
        $locale = app()->LangManager->setLocale(request()->getRequestUri());

        // locale da parametro query stringa (alcuni link potrebbero contenerla, es. link di password reset)
        if ($request->locale && in_array($request->locale, $availableLocales)) {
            $locale = $request->locale;
        }

        // recupero da sessione
        if (! $locale && session()->has('locale')) {
            $locale = session('locale');
        }

        // se non ne ho ancora uno valido, prendo quello di default
        if (!$locale) {
            $locale = current($availableLocales)[0];
        }
        session()->put('locale', $locale);

        // redirect da user agent se sono in root
        $uric = parse_url($request->getRequestUri());
        if (!empty($uric["path"]) && $uric["path"] == '/') {

            $qst = !empty($uric["query"]) ? $uric["query"] : '';
            $qst = $qst ? '?'.$qst : '';

            $userLangs = preg_split('/,|;/', $request->getPreferredLanguage());
            foreach ($userLangs as $userLocale) {
                if (array_key_exists($userLocale, $availableLocales)) {
                    return redirect($availableLocales[$userLocale].$qst);
                }
            }

            // cartella default
            return redirect('/'.array_values($availableLocales)[0].$qst);

        }

        /**
         * imposto locale
         */
        app()->setLocale($locale);
        app()->LangManager->store(app()->getLocale());


        /**
         * Inietto traduzioni da csv nel translator di laravel
         */
        app()->LangManager->loadTrads(app()->getLocale());


        /**
         * carico link
         */

        return $next($request);


    }
}
