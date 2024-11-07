<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;

class Htaccess
{
    /**
    * Elaborazione iniziale delle richieste
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @return mixed
    */
    public function handle($request, Closure $next)
    {

        if (!app()->environment("local") && $request->getSchemeAndHttpHost() !== config("app.url")) {
            return redirect(config("app.url").$request->getRequestUri());
        }

        if (!$request->secure() && env("FORCE_HTTPS") == true) {
            return redirect()->secure($request->getRequestUri());
        }

        // forbidden cartella public per chiamata diretta
        if (Str::startsWith($request->getRequestUri(), '/public')) {
            abort(404);
        }

        // rimuovo trailing slash da url sostituendo manulamente la regola nell'htaccess di
        // laravel per evitare che questa aggiunga "public" all'url (v. punto precedente)
        if ($request->getRequestUri() !== '/' && Str::endsWith($request->getRequestUri(), '/')) {
            return redirect(rtrim($request->getRequestUri(), "/"));
        }

        // redirect in base a lingua utente
        $uric = parse_url($request->getRequestUri());
        if (array_key_exists("path", $uric) && $uric["path"] == '/') {

            $qst = !empty($uric["query"]) ? $uric["query"] : '';
            $qst = $qst ? '?'.$qst : '';

            $LOCALES = [
                "it_IT" => 'it'
                ,"en_EN" => 'en'
            ];

            $userLangs = preg_split('/,|;/', $request->getPreferredLanguage());
            foreach ($userLangs as $locale) {
                if (array_key_exists($locale, $LOCALES)) {
                    return redirect($LOCALES[$locale].$qst, 301);
                }
            }

            // cartella default
            return redirect(array_values($LOCALES)[0].$qst, 301);

        }


        return $next($request);
    }
}
