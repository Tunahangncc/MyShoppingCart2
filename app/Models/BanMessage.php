<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\BanMessage
 *
 * @property int $id
 * @property int $user_id
 * @property string $message_title
 * @property string $message_body
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|BanMessage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BanMessage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BanMessage query()
 * @method static \Illuminate\Database\Eloquent\Builder|BanMessage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BanMessage whereMessageBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BanMessage whereMessageTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BanMessage whereUserId($value)
 * @mixin \Eloquent
 */
class BanMessage extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['user_id', 'message_body', 'message_title'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
