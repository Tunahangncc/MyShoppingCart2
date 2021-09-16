<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ShoppingHistory
 *
 * @property int $id
 * @property int $user_id
 * @property string $total_expenditure
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingHistory whereTotalExpenditure($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingHistory whereUserId($value)
 * @mixin \Eloquent
 * @property-read \App\Models\User $user
 */
class ShoppingHistory extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['user_id', 'total_expenditure'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
