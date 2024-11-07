<?php
/**
 * @credits: https://raw.githubusercontent.com/spatie/laravel-cookie-consent/master/src/CookieConsentMiddleware.php
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;

class CookieConsent
{
    /**
     * Sets defaults
     */
    public function __construct()
    {
        $this->cookieConsentUrl = config("cookie_consent.url") ?: '/cookie-consent';
        $this->viewName = config("cookie_consent.view_name") ?: 'components.cookie_consent';
        $this->cookieValidityTime = config("cookie_consent.time") ?: 60 * 24 * 365;
    }

    public function handle($request, Closure $next)
    {

        $response = $next($request);

        // conferma cookie
        if ($request->getRequestUri() == $this->cookieConsentUrl) {

            Cookie::queue("cookie_consent", "1", (int)$this->cookieValidityTime);

            return response("1", 200);
        }


        if (! $response instanceof Response) {
            return $response;
        }

        if (! $this->containsBodyTag($response)) {
            return $response;
        }

        $cookieName = config("cookie_consent.cookie_name") ?: 'cookie_consent';

        // aggiunge banner dei cookie
        if (!Cookie::has($cookieName)) {
            return $this->addCookieConsentScriptToResponse($response);
        }


        return $response;
    }

    protected function containsBodyTag(Response $response): bool
    {
        return $this->getLastClosingBodyTagPosition($response->getContent()) !== false;
    }

    /**
     * @param \Illuminate\Http\Response $response
     *
     * @return $this
     */
    protected function addCookieConsentScriptToResponse(Response $response)
    {
        $content = $response->getContent();

        $closingBodyTagPosition = $this->getLastClosingBodyTagPosition($content);

        $content = ''
            .substr($content, 0, $closingBodyTagPosition)
            .view($this->viewName, [
                "cookieConsentUrl" => $this->cookieConsentUrl
            ])->render()
            .substr($content, $closingBodyTagPosition);

        return $response->setContent($content);
    }

    protected function getLastClosingBodyTagPosition(string $content = '')
    {
        return strripos($content, '</body>');
    }
}
