<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\UserFormController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\ThankYouPageController;
use App\Http\Controllers\Api\PaymentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


/**
 * Test logged user
 */
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

    return $request->user();

});







/**
 * 
 * ORDINI
 * Endpoint autenticati
 * 
 */
Route::middleware('auth:sanctum')->group(function() {

    /**
     * Procedura di acquisto
     */
    Route::prefix('cart')->group(function() {

        Route::addRoute(["GET"], '/', [MenuController::class, 'index']);
        Route::addRoute(["PUT"], '/{cart}', [MenuController::class, 'submit']);

        Route::addRoute(["GET"], '/{cart}/form', [UserFormController::class, 'index']);
        Route::addRoute(["POST"], '/{cart}/order', [UserFormController::class, 'submit']);

        Route::addRoute(["GET"], '/{cart}/{order:code}/payment', [PaymentController::class, 'verify'])->withoutScopedBindings();

    });

    Route::prefix('orders')->group(function() {

        // thankyou page per ordine
        Route::addRoute(["GET"], '/{order:code}/thank-you', [ThankYouPageController::class, 'showOrder']);

        // lista ordini
        Route::get('/', [OrderController::class, 'index']);

        // dettaglio ordine
        Route::get('/{order:code}', [OrderController::class, 'show']);

        // imposta ordine completato
        Route::patch('/{order:code}/fulfill', [OrderController::class, 'fulfill']);

    });

    /**
     * Verifica pagamento
     */
    // Route::prefix('payments')->group(function() {
    //     Route::addRoute(["GET"], '/{order:code}/verify', [PaymentController::class, 'verify']);
    // });

    /**
     * Lista ordini
     */
    // Route::addRoute(["GET", "POST"], '/orders', '\App\Http\Controllers\Api\OrdersController@index');
    
    
    /**
     * Dettaglio ordine
     */
    // Route::addRoute(["GET", "POST"], '/orders/{code}', '\App\Http\Controllers\Api\OrdersController@show');
    
    
    /**
     * Imposta completato / riscattato
     */
    // Route::addRoute(["PATCH", "POST"], '/orders/{code}/complete', '\App\Http\Controllers\Api\OrdersController@actionComplete');
    

    /**
     * Richiesta rimborso
    */
    // Route::addRoute(["PATCH", "POST"], '/orders/{code}/refund-request', '\App\Http\Controllers\Api\OrdersController@actionRefundRequest');

    /**
     * Effettuazione rimborso
    */
    // Route::addRoute(["PATCH", "POST"], '/orders/{code}/refund/{locale}', '\App\Http\Controllers\Api\OrdersController@actionRefund');


    /**
     * Creazione html dettaglio
     */
    // Route::addRoute(["GET"], '/orders/{code}/html/{locale}', '\App\Http\Controllers\Api\OrdersController@htmlDetail')->where("code", '[a-zA-Z0-9]+');


    /* Route::addRoute(["GET"], '/connection', function (Request $request) {
    
        try {
            DB::connection("frontsite")->table("ordine")->select()->get();
            
            return 'ok';
        } catch (Exception $e) {
            abort(500);
        }
    
    }); */

    /**
     * Mail di conferma ordine
     */
    // Route::addRoute(["GET"], '/orders/{code}/confirmation-mail/{locale}/{mode?}', [OrdersController::class, 'confirmationMail'])->where("code", '[a-zA-Z0-9]+');

    
    /**
     * 
     * DASHBOARD ORDINI
     * Endpoint autenticati
     * 
     */
    // Route::addRoute(["GET"], '/dashboard/quantities/{mode?}', [DashboardController::class, 'quantities']);

});


/**
 * Genera QRCode per un dato ordine
 */
Route::addRoute(["GET"], '/orders/{order:code}/qrcode/{format?}', [OrderController::class, 'qrcode'])->name("orders.qrcode");




/**
 * Da abilitare temporaneamente per creare token e utenti
 */
/* Route::get("user", function() {

    $user = User::where("email", "emanuele@atrio.it")->firstOrNew();

    $user->name = 'website';
    $user->email = 'emanuele@atrio.it';
    $user->password = Hash::make("hsdgadzl8o374tgfagft9.af.nfiw5e46gk");

    $user->save();

    $token = $user->createToken("ordini",[
        "orders:request-refund",
        "orders:refund",
        "orders:mail", // mail di conferma ordine
        "orders:request-refund-mail", // mail di richiesta conferma rimborso
        "orders:refund-mail", // mail di conferma rimborso
    ]);

    return ['token' => $token->plainTextToken];
}); */


