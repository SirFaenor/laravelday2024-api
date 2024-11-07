<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return 'Welcome, Professor Falken.';
});

/**
 * Mock url per il pagamento
 */
Route::get('fake-payment', function (Request $request) {
    
    $redirect = $request->r;

    return view('fake-payment', [
        'redirect' => $redirect,
    ]);

})->name('payment.init');

