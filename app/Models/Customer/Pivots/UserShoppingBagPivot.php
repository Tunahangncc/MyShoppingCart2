<?php

namespace App\Models\Customer\Pivots;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Customer\Pivots\UserShoppingBagPivot
 *
 * @property int $user_id
 * @property int $shopping_bag_id
 * @method static \Illuminate\Database\Eloquent\Builder|UserShoppingBagPivot newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserShoppingBagPivot newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserShoppingBagPivot query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserShoppingBagPivot whereShoppingBagId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserShoppingBagPivot whereUserId($value)
 * @mixin \Eloquent
 */
class UserShoppingBagPivot extends Model
{
    use HasFactory;

    public $fillable = [
        'user_id',
        'shopping_bag_id',
    ];
}
