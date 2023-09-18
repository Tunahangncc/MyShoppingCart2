<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CloudFile
 *
 * @property int $id
 * @property string $table_name
 * @property int $table_column_id
 * @property string $img_name
 * @property int $img_size
 * @property string $img_slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CloudFile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CloudFile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CloudFile query()
 * @method static \Illuminate\Database\Eloquent\Builder|CloudFile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CloudFile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CloudFile whereImgName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CloudFile whereImgSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CloudFile whereImgSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CloudFile whereTableColumnId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CloudFile whereTableName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CloudFile whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CloudFile extends Model
{
    use HasFactory;

    public $fillable = [
        'table_name',
        'table_column_id',
        'img_name',
        'img_size',
        'img_slug'
    ];
}
