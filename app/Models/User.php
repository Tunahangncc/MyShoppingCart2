<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\Models\User
 *
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $gender
 * @property string $slug
 * @property string $images
 * @property string $type
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read int|null $products_count
 * @property-read \App\Models\ShoppingBag $shoppingBag
 * @property string $date_of_birth
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDateOfBirth($value)
 * @property-read \App\Models\Address $address
 * @property-read \App\Models\MessageBox $messages
 * @property-read \App\Models\CustomerContact $contactMessage
 * @property-read \App\Models\ShoppingHistory $shoppingHistory
 * @property-read \App\Models\AdminInformations $adminInformation
 * @property-read \App\Models\BanMessage|null $banMessage
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\LikeProduct[] $likeProducts
 * @property-read int|null $like_products_count
 */
class User extends Authenticatable
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'password', 'gender', 'slug', 'images', ''];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function shoppingBag()
    {
        return $this->belongsTo(ShoppingBag::class);
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function messages()
    {
        return $this->belongsTo(MessageBox::class);
    }

    public function contactMessage()
    {
        return $this->belongsTo(CustomerContact::class);
    }

    public function shoppingHistory()
    {
        return $this->hasOne(ShoppingHistory::class);
    }

    public function adminInformation()
    {
        return $this->hasOne(AdminInformations::class);
    }

    public function banMessage()
    {
        return $this->hasOne(BanMessage::class);
    }
}
