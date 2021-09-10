<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ShoppingBag
 *
 * @property int $id
 * @property int $user_id
 * @property int $product_id
 * @property int $quantity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product $product
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingBag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingBag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingBag query()
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingBag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingBag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingBag whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingBag whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingBag whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingBag whereUserId($value)
 * @mixin \Eloquent
 */
class ShoppingBag extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_id', 'quantity'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
