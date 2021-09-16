<?php

use App\Models\ShoppingHistory;

$totalProducts = productCount();
$totalUsers = getUserCount();

$sales = ShoppingHistory::all();
$totalSales = 0;
foreach ($sales as $sale )
{
    $totalSales += (int)$sale->total_expenditure;
}

?>

<!-- Card stats -->
<div class="flex flex-wrap">
    <div class="w-full lg:w-6/12 xl:w-4/12 px-4">
        <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
            <div class="flex-auto p-4">
                <div class="flex flex-wrap">
                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                        <h5 class="text-blueGray-400 uppercase font-bold text-xs">{{ __('messages.widget card stats text.total products') }}</h5>

                        <span class="font-semibold text-xl text-blueGray-700">{{ $totalProducts }}</span>
                    </div>

                    <div class="relative w-auto pl-4 flex-initial">
                        <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-red-500">
                            <i class="fab fa-product-hunt"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full lg:w-6/12 xl:w-4/12 px-4">
        <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
            <div class="flex-auto p-4">
                <div class="flex flex-wrap">
                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                        <h5 class="text-blueGray-400 uppercase font-bold text-xs">{{ __('messages.widget card stats text.total users') }}</h5>

                        <span class="font-semibold text-xl text-blueGray-700">{{ $totalUsers }}</span>
                    </div>

                    <div class="relative w-auto pl-4 flex-initial">
                        <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-orange-500">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full lg:w-6/12 xl:w-4/12 px-4">
        <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
            <div class="flex-auto p-4">
                <div class="flex flex-wrap">
                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                        <h5 class="text-blueGray-400 uppercase font-bold text-xs">{{ __('messages.widget card stats text.total sales') }}</h5>

                        <span class="font-semibold text-xl text-blueGray-700">{{ $totalSales }}</span>
                    </div>

                    <div class="relative w-auto pl-4 flex-initial">
                        <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-pink-500">
                            <i class="fas fa-piggy-bank"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
