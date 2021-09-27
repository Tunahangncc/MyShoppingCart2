<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CategoriesPivot
 *
 * @property int $category_id
 * @property int $sub_id
 * @method static \Illuminate\Database\Eloquent\Builder|CategoriesPivot newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoriesPivot newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoriesPivot query()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoriesPivot whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoriesPivot whereSubId($value)
 * @mixin \Eloquent
 */
class CategoriesPivot extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['category_id', 'sub_id'];
}
