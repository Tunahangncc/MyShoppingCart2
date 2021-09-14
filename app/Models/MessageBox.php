<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\MessageBox
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $body
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|MessageBox newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MessageBox newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MessageBox query()
 * @method static \Illuminate\Database\Eloquent\Builder|MessageBox whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MessageBox whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MessageBox whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MessageBox whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MessageBox whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MessageBox whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MessageBox whereUserId($value)
 * @mixin \Eloquent
 */
class MessageBox extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
