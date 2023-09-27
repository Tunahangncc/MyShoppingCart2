<?php

namespace App\Models\Customer;

use App\Models\Customer\Pivots\ProductShoppingBagPivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Customer\ShoppingBag
 *
 * @property int $id
 * @property string $code
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Customer\Product> $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingBag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingBag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingBag query()
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingBag whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingBag whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingBag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingBag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingBag whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ShoppingBag extends Model
{
    use HasFactory;

    public $fillable = [
        'code',
    ];

    #region Relations
    public function products()
    {
        return $this->hasMany(ProductShoppingBagPivot::class, 'shopping_bag_id', 'id');
    }
    #endregion
}
