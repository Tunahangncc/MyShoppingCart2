<?php

namespace App\Models\Customer;

use App\Models\CloudFile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Customer\Product
 *
 * @property int $id
 * @property string $title
 * @property string|null $subtitle
 * @property string $price
 * @property int $created_by
 * @property string $expire_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, CloudFile> $cloudFile
 * @property-read int|null $cloud_file_count
 * @property-read User $createdBy
 * @method static \Database\Factories\Customer\ProductFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereExpireDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSubtitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Product extends Model
{
    use HasFactory;

    public $fillable = [
        'title',
        'subtitle',
        'price',
        'created_by',
        'expire_date'
    ];

    #region RELATIONS
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function cloudFile()
    {
        return $this->hasMany(CloudFile::class, 'table_column_id', 'id');
    }
    #endregion
}
