<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

/**
 * @mixin IdeHelperMenuCategory
 */
class MenuCategory extends Model
{
    use HasTranslations;

    protected $table = 'menu_categories';

    /**
     * @var array<int,string>
     */
    protected array $translatable = [
        'name',
    ];

    /**
     * @return HasMany<Menu,$this>
     */
    public function items(): HasMany
    {
        return $this->hasMany(Menu::class, 'category_id');
    }



}
