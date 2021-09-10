@extends('customers.layouts.master')

@section('title')
    <title>{{ __('messages.invisible links.profile shopping bag') }}</title>
@endsection

@section('SpecialCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/css/customer/profile.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/css/customer/profile_shopping_bag.css') }}">
@endsection


@section('content')

    <?php
    $i = 0;
    $fullName = Auth::user()->name;
    $nameArray = explode(' ', $fullName);
    ?>

    <div class="profile-content-area flex justify-around">
        <div class="profile-categories mt-6">
            @include('customers.widgets.profile_category')
        </div>

        <div class="shopping-bag-area container mt-10">
            <div class="shopping-bag-content flex shadow-md my-10">
                <div class="shopping-bag-product-details w-3/4 bg-white px-10 py-10">
                    <div class="flex justify-between border-b pb-8">
                        <h1 class="font-semibold text-2xl">{{ __('messages.profile shopping bag text.shopping cart') }}</h1>
                        <h2 class="font-semibold text-2xl">3 {{ __('messages.profile shopping bag text.items') }}</h2>
                    </div>

                    <div class="flex mt-10 mb-5">
                        <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">{{ __('messages.profile shopping bag text.product details') }}</h3>
                        <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">{{ __('messages.profile shopping bag text.quantity') }}</h3>
                        <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">{{ __('messages.profile shopping bag text.price') }}</h3>
                        <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">{{ __('messages.profile shopping bag text.total') }}</h3>
                    </div>

                    <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
                        <div class="flex w-2/5"> <!-- product -->
                            <div class="w-20">
                                <img class="h-24" src="https://drive.google.com/uc?id=18KkAVkGFvaGNqPy2DIvTqmUH_nk39o3z" alt="">
                            </div>
                            <div class="flex flex-col justify-between ml-4 flex-grow">
                                <span class="font-bold text-sm">Iphone 6S</span>
                                <span class="text-red-500 text-xs">Apple</span>
                                <a href="#" class="font-semibold hover:text-red-500 text-gray-500 text-xs">{{ __('messages.profile shopping bag text.remove') }}</a>
                            </div>
                        </div>
                        <div class="flex justify-center w-1/5">
                            <span class="text-center w-1/5 font-semibold text-sm">2</span>
                        </div>
                        <span class="text-center w-1/5 font-semibold text-sm">$400.00</span>
                        <span class="text-center w-1/5 font-semibold text-sm">$400.00</span>
                    </div>
                    <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
                        <div class="flex w-2/5"> <!-- product -->
                            <div class="w-20">
                                <img class="h-24" src="https://drive.google.com/uc?id=18KkAVkGFvaGNqPy2DIvTqmUH_nk39o3z" alt="">
                            </div>
                            <div class="flex flex-col justify-between ml-4 flex-grow">
                                <span class="font-bold text-sm">Iphone 6S</span>
                                <span class="text-red-500 text-xs">Apple</span>
                                <a href="#" class="font-semibold hover:text-red-500 text-gray-500 text-xs">{{ __('messages.profile shopping bag text.remove') }}</a>
                            </div>
                        </div>
                        <div class="flex justify-center w-1/5">
                            <span class="text-center w-1/5 font-semibold text-sm">2</span>
                        </div>
                        <span class="text-center w-1/5 font-semibold text-sm">$400.00</span>
                        <span class="text-center w-1/5 font-semibold text-sm">$400.00</span>
                    </div>

                    <a href="{{ route('customerProducts') }}" class="flex font-semibold text-indigo-600 text-sm mt-10">
                        <svg class="fill-current mr-2 text-indigo-600 w-4" viewBox="0 0 448 512"><path d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"/></svg>
                        {{ __('messages.profile shopping bag text.continue shopping') }}
                    </a>
                </div>

                <div id="summary" class="w-1/4 px-8 py-10">
                    <h1 class="font-semibold text-2xl border-b pb-8">{{ __('messages.profile shopping bag text.order summary') }}</h1>
                    <div class="flex justify-between mt-10 mb-5">
                        <span class="font-semibold text-sm uppercase">{{ __('messages.profile shopping bag text.items') }} 3</span>
                        <span class="font-semibold text-sm">590$</span>
                    </div>

                    <div class="border-t mt-8">
                        <div class="flex font-semibold justify-between py-6 text-sm uppercase">
                            <span>{{ __('messages.profile shopping bag text.total cost') }}</span>
                            <span>$600</span>
                        </div>
                        <button class="bg-indigo-500 font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full">{{ __('messages.profile shopping bag text.order now') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('SpecialJs')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
@endsection
