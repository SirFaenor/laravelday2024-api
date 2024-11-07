<?php
use App\Models\Order;
use App\Mail\ExceptionOccuredMail;
use Illuminate\Support\HtmlString;
use App\Mail\OrderConfirmationMail;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Notifications\OrderConfirmed;
use Illuminate\Support\Facades\Route;
use Illuminate\Notifications\AnonymousNotifiable;
use Illuminate\Support\Facades\Notification;

Route::get('exception', function () {

    throw new Exception("Test");


});


Route::get('mail', function () {

    return Mail::send([], [], function ($message) {
        $message
            ->to("emanuele@atrio.it")
            ->subject("Test invio mail")
        ;

        return $message;
      });

});


Route::get('orders/{order:code}/mail', function (Order $order) {

    $notification = new OrderConfirmed($order);

    $notification->locale = 'it';

    Notification::route('mail', $order->customer_email)->notify($notification);

    return $notification->toMail(new AnonymousNotifiable);

});

Route::get('orders/{order:code}/qrcode', function (Order $order) {

    return '<img src="'.(route('orders.qrcode', [$order->code], true)).'" width="200" height="auto">';

});