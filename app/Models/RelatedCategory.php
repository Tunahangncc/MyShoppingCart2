<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\RelatedCategory
 *
 * @property int $id
 * @property int $category_id
 * @property string $top_categories
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|RelatedCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RelatedCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RelatedCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|RelatedCategory whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RelatedCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RelatedCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RelatedCategory whereTopCategories($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RelatedCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class RelatedCategory extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
