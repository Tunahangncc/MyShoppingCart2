<?php

use App\Models\Product;
use App\Models\User;

function getMyProduct()
{
    return Product::query()->with(['user', 'brand', 'category', 'color'])->where('user_id', Auth::user()->id)->paginate(10);
}

function getMyProductCount($id)
{
    return Product::query()->selectRaw('count(*) as productCount')->where('user_id', $id)->first();
}

function getUserCount()
{
    return count(User::all());
}

function getMonthName($monthSlug)
{
    $monthName = "";
    switch ($monthSlug)
    {
        case 'Jan':
            $monthName = 'January';
            break;
        case 'Feb':
            $monthName = 'February';
            break;
        case 'Mar':
            $monthName = 'March';
            break;
        case 'Apr':
            $monthName = 'April';
            break;
        case 'May':
            $monthName = 'May';
            break;
        case 'June':
            $monthName = 'June';
            break;
        case 'July':
            $monthName = 'July';
            break;
        case 'Aug':
            $monthName = 'August';
            break;
        case 'Sep':
            $monthName = 'September';
            break;
        case 'Oct':
            $monthName = 'October';
            break;
        case 'Nov':
            $monthName = 'November';
            break;
        case 'Dec':
            $monthName = 'December';
            break;
        default:
            $monthName = '';
    }

    return $monthName;
}
