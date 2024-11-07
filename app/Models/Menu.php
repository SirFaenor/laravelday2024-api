<?php

namespace App\Models;

use App\Models\MenuCategory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $code
 * @mixin IdeHelperMenu
 */
class Menu extends Model
{
    use HasTranslations;

    /**
     * @var string
     */
    protected $table = 'menu';

    /**
     * @var array<int,string>
     */
    protected $fillable = [
        'code',
    ];

    /**
     * @var array<int,string>
     */
    protected array $translatable = [
        'title',
        'subtitle',
        'description',
    ];

    /**
     * @return BelongsTo<MenuCategory,$this>
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(MenuCategory::class, 'category_id', 'id');
    }
}
