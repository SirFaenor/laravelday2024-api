<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode as Middleware;
use App\Http\Exceptions\ComingSoonException;
use App\Http\Exceptions\MaintenanceException;
use Illuminate\Support\Facades\Cookie;

/**
 * Gestisce manutenzione e comingsoon.
 * Per farlo entrare in azione, inserire in ambiente
 * la variabile APP_DOWN con il valore "maintenance" o "comingsoon".
 * Per abilitare alla visione alcuni ip, inserire in ambiente la variabile
 * APP_DOWN_ALLOWED con un elenco separato da virgola di ip abilitati
 */
class CheckForMaintenanceMode extends Middleware
{
    protected $request;
    protected $app;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function handle($request, Closure $next)
    {

        // ?p=1 per abilitare visualizzazione
        if ($request->p == 1) {
            Cookie::queue("preview", 1);
            return $next($request);
        }

        if (env('APP_DOWN') == 'maintenance' &&
            (int)Cookie::get("preview") !== 1
        ):
            throw new MaintenanceException();
        endif;

        if (env('APP_DOWN') == 'comingsoon' &&
            (int)Cookie::get("preview") !== 1
        ):
            throw new ComingSoonException();
        endif;

        return $next($request);


    }

}
