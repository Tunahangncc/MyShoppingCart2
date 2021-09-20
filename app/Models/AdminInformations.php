<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AdminInformations
 *
 * @property int $id
 * @property int $user_id
 * @property string $type
 * @property string $about
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|AdminInformations newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminInformations newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminInformations query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminInformations whereAbout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminInformations whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminInformations whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminInformations whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminInformations whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminInformations whereUserId($value)
 * @mixin \Eloquent
 * @property string $status
 * @method static \Illuminate\Database\Eloquent\Builder|AdminInformations whereStatus($value)
 * @property string $permissions
 * @method static \Illuminate\Database\Eloquent\Builder|AdminInformations wherePermissions($value)
 */
class AdminInformations extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
