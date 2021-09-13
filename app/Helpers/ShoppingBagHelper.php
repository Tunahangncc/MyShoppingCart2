<?php

use App\Models\ShoppingBag;
use Illuminate\Database\Eloquent\Collection;

function getTotalPrice(Collection $bag)
{
    $totalPrice = 0;

    foreach ($bag as $item)
    {
        $productTotalPrice = $item->quantity * $item->product->price;
        $totalPrice += $productTotalPrice;
    }

    return $totalPrice;
}
