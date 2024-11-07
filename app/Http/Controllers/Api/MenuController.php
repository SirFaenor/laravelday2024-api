<?php

namespace App\Http\Controllers\Api;

use Closure;
use App\Models\Cart;
use App\Models\Menu;
use App\Models\Order;
use Illuminate\Support\Str;
use App\Models\MenuCategory;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\MessageBag;
use App\Http\Controllers\Controller;

/**
 * Gestisce visualizzazione del menu
 * e inserimento delle voci in carrello
 */
class MenuController extends Controller
{
    /**
     *
     * /cart?locale={locale}
     * Restituisce lista in json o html per la pagina del carrello
     *
     */
    public function index(Request $request): JsonResponse
    {

        /**
         * Validazione base, se qualcosa va male qui
         * ritorno un responso con codice 422
         */
        try {
            $validated = $request->validate([
                'locale' => ['required', 'string', 'in:it,en'],
                'submit_url' => ['required', 'string'],

                // inoltrati per essere visualizzati
                'previous-errors' => ['nullable', 'array'],
                'cart_id' => ['nullable', 'integer'],
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {

            return response()->json([
                'message' => $e->errors()
            ], 422);
        }

        app()->setLocale($validated['locale']);

        $categories = MenuCategory::with(['items' => fn ($builder) => $builder->orderBy('sort')])
                        ->orderBy('sort')
                        ->get();

        /**
         * Crea un carrello se non abbiamo
         * ricevuto un id preesistente
         */
        if (isset($validated['cart_id'])) {
            $cart = Cart::findOrFail($validated['cart_id']);

            ray($cart)->label('Carrello recuperato')->color('blue');
        } else {
            $cart = Cart::create([
                'cart_uuid' => Str::uuid()
            ]);
            ray($cart)->label('Carrello creato')->color('blue');
        }

        return response()->json([
            'cart_id' => $cart->id,
            'html' => view("cart.index", [
                // lista dei prodotti
                'categories' => $categories,
                // locale corrente
                'locale' => $validated['locale'],
                // url a cui inviare il carrello
                'submit_url' => $validated['submit_url'],
                // lista degli id dei prodotti selezionati
                'selected' => $cart->product_ids,

                // cart total
                'total' => $cart->total,

                'errors' => new MessageBag($validated['previous-errors'] ?? []),
            ])->render()
        ]);
    }

    /**
     * @param array<string,mixed> $validated
     */
    /*  protected function indexJson(array $validated) : ResourceCollection
     {

         $menu = Menu::with('category')->get()->sortBy('category.sort');

         return MenuResource::collection($menu);
     } */


    /**
     * Inserisce prodotti in carrello
     */
    public function submit(Request $request, Cart $cart): JsonResponse
    {

        /**
         * Il carrello non deve avere già generato un ordine
         */
        if (Order::where('cart_id', $cart->id)->exists()) {
            abort(500, 'Cart already converted to order');
        }


        /**
         * Imposta locale per avere messaggi di errore in lingua
         */
        app()->setLocale($request->input('locale') ?? 'it');


        /**
         * Valida locale e redirect_url
         */
        try {
            $validated = $this->validate($request, [
                'locale' => ['required', 'string', 'in:it,en'],
                'redirect_url' => ['required', 'string', 'url'],

                'quantity' => [
                    'required',
                    'array',
                    function (string $attribute, mixed $value, Closure $fail) {

                        // verifica che almeno una quantità sia stata selezionata
                        $selectedIds = array_filter($value, fn ($v) => !is_null($v) && $v > 0);
                        if (count($selectedIds) === 0) {
                            $fail(__('cart.index.errors.quantity'));
                        }

                        // verifica che tutti gli id id prodotto passati siano validi
                        $products = Menu::whereIn('id', array_keys($selectedIds))->get();
                        if ($products->count() < count($selectedIds)) {
                            $fail(__('cart.index.errors.invalid_id'));
                        }
                    },
                ],
                'quantity.*' => [
                    'nullable',
                    'integer'
                ],

            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => $e->errors()
            ], 422);
        }


        app()->setLocale($request->input('locale'));

        /**
         * Aggiorna il carrello, prodotti e totale
         */
        $validated['quantity'] = array_filter($validated['quantity'], fn ($quantity) => !is_null($quantity) && $quantity > 0);
        $validated['quantity'] = array_map('intval', $validated['quantity']);
        $cart->product_ids = $validated['quantity'];

        $total = 0;
        $products = Menu::whereIn('id', array_keys($cart->product_ids))->get();
        foreach ($products as $product) {
            $total += $product->price * $cart->product_ids[$product->id];
        }
        $cart->total = $total;
        $cart->save();


        ray($cart)->label('Carrello aggiornato')->color('blue');


        /**
         * ok
         */
        return response()->json([
            'redirect_url' => $request->input('redirect_url')
        ], 200);
    }

}
