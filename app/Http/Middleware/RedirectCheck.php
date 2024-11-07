<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class RedirectCheck
{
    /**
    * Controlla tabella redirect e reindirizza
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @return mixed
    */
    public function handle($request, Closure $next)
    {

        /**
         * recupero tabelle
         */
        $redirect = DB::table("link_redirect")->where("link_old", $request->getRequestUri())->first();
        if ($redirect) {
            return redirect()->to($redirect->link_new, 301);
        }

        return $next($request);
    }
}
