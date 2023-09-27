<?php

namespace App\Models\Customer\Pivots;

use App\Models\Customer\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductShoppingBagPivot extends Model
{
    use HasFactory;

    public $fillable = [
        'product_id',
        'shopping_bag_id',
        'amount'
    ];

    public $timestamps = false;

    #region Relations
    public function productDetail()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    #endregion
}
