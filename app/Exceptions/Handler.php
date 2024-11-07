<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Mail;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Throwable $exception)
    {

        // riporta sempre errore via mail se eccezione è idonea e se sono in produzione
        if (app()->config->get("app.env") == 'production' && $this->shouldReport($exception)) {
            $this->sendEmail($exception);
        }

        // metodo genitore, scrive anche log di Laravel
        parent::report($exception);
    }


    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Throwable $exception)
    {

        if ($exception instanceof \Illuminate\Http\Exceptions\PostTooLargeException) {
            return response("Il file caricato è troppo pesante.", 500);
        }

        // pulisco tutti i livelli di buffer
        while (ob_get_level()) {
            ob_end_clean();
        }

        // se app è in debug mode mostra pagina del logger (Whoops) con dettagli dell'errore,
        // altrimenti esegue il render della vista di errore corrispondente al codice di risposta
        return parent::render($request, $exception);
    }


    /**
     * Invia mail di notifica
     */
    protected function sendEmail(Throwable $exception)
    {

        return true;

    }



}
