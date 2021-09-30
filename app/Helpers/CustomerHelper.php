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

function convertMonth($monthSlug)
{
    $monthName = "";
    switch ($monthSlug)
    {
        case 'January':
            $monthName = 'Jan';
            break;
        case 'February':
            $monthName = 'Feb';
            break;
        case 'March':
            $monthName = 'Mar';
            break;
        case 'April':
            $monthName = 'Apr';
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
        case 'August':
            $monthName = 'Aug';
            break;
        case 'September':
            $monthName = 'Sep';
            break;
        case 'October':
            $monthName = 'Oct';
            break;
        case 'November':
            $monthName = 'Nov';
            break;
        case 'December':
            $monthName = 'Dec';
            break;
        default:
            $monthName = '';
    }

    return $monthName;
}
