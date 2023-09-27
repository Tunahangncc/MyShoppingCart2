<?php

namespace App\Models;

use App\Models\Customer\ShoppingBag;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string|null $surname
 * @property string $username
 * @property string $password
 * @property string $phone
 * @property string $email
 * @property int|null $gender
 * @property int $is_active
 * @property int $is_admin
 * @property mixed|null $permissions
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePermissions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, ShoppingBag> $shoppingBags
 * @property-read int|null $shopping_bags_count
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use HasFactory;

    public $fillable = [
        'name',
        'surname',
        'username',
        'password',
        'phone',
        'email',
        'gender',
        'is_active',
        'is_admin',
        'permissions'
    ];

    #region Relations
    public function shoppingBags()
    {
        return $this->belongsToMany(
            ShoppingBag::class,
            'user_shopping_bag_pivots',
            'user_id',
            'shopping_bag_id'
        );
    }
    #endregion
}
