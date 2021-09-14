<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CustomerContact
 *
 * @property int $id
 * @property int $user_id
 * @property string $message_name
 * @property string $message_body
 * @property string $message_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerContact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerContact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerContact query()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerContact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerContact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerContact whereMessageBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerContact whereMessageName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerContact whereMessageType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerContact whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerContact whereUserId($value)
 * @mixin \Eloquent
 */
class CustomerContact extends Model
{
    use HasFactory;
    public $fillable = ['user_id','message_name', 'message_type', 'message_body'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
