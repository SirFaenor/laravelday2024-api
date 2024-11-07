<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * Rappresenta un carrello
 * inizializzato da app main
 *
 * @mixin IdeHelperCart
 * @property int $id
 * @property string $cart_uuid
 * @property array|null $product_ids
 * @property string|null $total
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereCartUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereProductIds($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereUpdatedAt($value)
 */
	class Cart extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property string $code
 * @mixin IdeHelperMenu
 * @property int $id
 * @property int|null $category_id
 * @property array|null $title
 * @property array|null $subtitle
 * @property array|null $description
 * @property int|null $tray_slots numero di slot occupati nel vassoio
 * @property string|null $tray_label
 * @property int $tray_fontsize etichetta vassoio - dimensione font
 * @property string|null $img_1
 * @property string|null $img_2
 * @property string|null $price
 * @property string $vegetarian
 * @property string $glutenfree
 * @property string $alcohol
 * @property string|null $allergens
 * @property string $with_milk
 * @property string $expiring_order L'ordine di questo prodotto può scadere?
 * @property int|null $availability
 * @property string $sellable Il prodotto è vendibile?
 * @property string $dashboard_visible visiblità nella dashboard ordini
 * @property int $sort
 * @property string $public
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\MenuCategory|null $category
 * @property-read mixed $translations
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu whereAlcohol($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu whereAllergens($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu whereAvailability($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu whereDashboardVisible($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu whereExpiringOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu whereGlutenfree($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu whereImg1($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu whereImg2($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu whereJsonContainsLocale(string $column, string $locale, ?mixed $value, string $operand = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu whereJsonContainsLocales(string $column, array $locales, ?mixed $value, string $operand = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu whereLocale(string $column, string $locale)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu whereLocales(string $column, array $locales)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu wherePublic($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu whereSellable($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu whereSubtitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu whereTrayFontsize($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu whereTrayLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu whereTraySlots($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu whereVegetarian($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu whereWithMilk($value)
 */
	class Menu extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @mixin IdeHelperMenuCategory
 * @property int $id
 * @property array $name
 * @property int $sort
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Menu> $items
 * @property-read int|null $items_count
 * @property-read mixed $translations
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MenuCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MenuCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MenuCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MenuCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MenuCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MenuCategory whereJsonContainsLocale(string $column, string $locale, ?mixed $value, string $operand = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MenuCategory whereJsonContainsLocales(string $column, array $locales, ?mixed $value, string $operand = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MenuCategory whereLocale(string $column, string $locale)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MenuCategory whereLocales(string $column, array $locales)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MenuCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MenuCategory whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MenuCategory whereUpdatedAt($value)
 */
	class MenuCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @mixin IdeHelperOrder
 * @property int $id
 * @property string $code
 * @property string|null $hash
 * @property int|null $cart_id
 * @property string $customer_email
 * @property string $subtotal
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Cart|null $cart
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OrderItem> $items
 * @property-read int|null $items_count
 * @property-read \App\Models\OrderPayment|null $payment
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order byCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order dateFrom(string $value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order dateTo(string $value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order expired()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order notPayed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order payed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order status(string $value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereCartId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereCustomerEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereSubtotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereUpdatedAt($value)
 */
	class Order extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @mixin IdeHelperOrderItem
 * @property int $id
 * @property int $order_id
 * @property int $menu_id
 * @property int $quantity
 * @property string $unit_price
 * @property string $subtotal
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Menu $menuItem
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereMenuId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereSubtotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereUpdatedAt($value)
 */
	class OrderItem extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @mixin IdeHelperOrderPayment
 * @property int $id
 * @property int|null $order_id
 * @property string $status
 * @property string|null $method
 * @property float $subtotal
 * @property float $fee_amount
 * @property string $total_amount
 * @property string|null $init_url
 * @property string|null $success_url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderPayment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderPayment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderPayment query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderPayment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderPayment whereFeeAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderPayment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderPayment whereInitUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderPayment whereMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderPayment whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderPayment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderPayment whereSubtotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderPayment whereSuccessUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderPayment whereTotalAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderPayment whereUpdatedAt($value)
 */
	class OrderPayment extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @mixin IdeHelperUser
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $username
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUsername($value)
 */
	class User extends \Eloquent {}
}

