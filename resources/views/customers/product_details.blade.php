@extends('customers.layouts.master')

@section('title')
    <title>{{ __('messages.invisible links.product details') }}</title>
@endsection

@section('SpecialCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/css/customer/product_details.css') }}">
@endsection


@section('content')

    <div class="grid md:grid-cols-2 sm:grid-cols-1">
        <div class="wrapper">
            <div>
                <img src="https://source.unsplash.com/random/350x350" alt=" random imgee" class="w-full object-cover object-center rounded-lg shadow-md">

                <div class="relative px-4 -mt-16">
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <div class="flex items-baseline">
                            <span class="bg-blue-200 text-blue-800 text-xs px-2 inline-block rounded-full  uppercase font-semibold tracking-wide">59 minute ago</span>

                            <div class="ml-2 text-gray-600 uppercase text-xs font-semibold tracking-wider">
                                Tunahan Genç
                            </div>
                        </div>

                        <h4 class="mt-1 text-xl font-semibold uppercase leading-tight truncate">Galaxy A30</h4>

                        <div class="mt-1">
                            ₺1800
                        </div>

                        <div class="mt-4 flex items-center">
                            <span class="text-blue-600 text-md font-semibold">4 {{ __('messages.product details card.people liked') }}</span>
                            <span class="text-md text-gray-600 ml-5">
                                <a href="#" class="product-like-button">
                                    <i class="product-like-button-icon transition duration-300 far fa-heart not-liked"></i>
                                    ({{ __('messages.product details card.do you want to like') }})
                                </a>
                            </span>
                        </div>

                        <div class="mt-3">
                            <a href="#" class="add-basket-button bg-gray-500 text-white p-2 rounded hover:bg-gray-800 transition duration-300"><i class="fas fa-shopping-basket mr-2"></i>{{ __('messages.product details card.add shopping bag') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="product-properties">
            <div class="p-20 md:w-full">
                <h3 class="text-blue-300 mb-4 md:text-2xl sm:text-md font-bold">
                    {{ __('messages.properties text.product properties') }}
                </h3>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <div class="mb-4">
                        <h2 class="text-2xl font-bold mb-2 text-gray-800">{{ __('messages.properties text.description') }}</h2>
                        <p class="text-gray-700">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium amet cupiditate distinctio ducimus exercitationem ipsam magnam natus possimus, quidem quod. Ad alias doloribus eius eveniet fuga, ipsum iste mollitia nihil?
                        </p>
                    </div>

                    <div>
                        <h2 class="text-xl font-bold mb-2 text-gray-800 mb-2">{{ __('messages.properties text.properties') }}</h2>
                        <ul>
                            <li class="mb-2">{{ __('messages.properties text.product price') }}: <span class="font-bold">₺1800</span></li>
                            <li class="mb-2">{{ __('messages.properties text.product category') }}: <span class="font-bold">Phone</span></li>
                            <li class="mb-2">{{ __('messages.properties text.product color') }}: <span class="font-bold">Black</span></li>
                            <li class="mb-2">{{ __('messages.properties text.product amount') }}: <span class="font-bold">4</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('SpecialJs')
    <script src="{{ asset('styles/js/customer/product_details.js') }}"></script>
@endsection
