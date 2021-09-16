@extends('customers.layouts.master')

@section('title')
    <title>{{ __('messages.invisible links.product details') }}</title>
@endsection

@section('SpecialCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/css/customer/product_details.css') }}">
@endsection


@section('content')

    <div class="product-details-area grid md:grid-cols-2 sm:grid-cols-1">
        <div class="wrapper">
            <div>
                <div class="flex justify-center">
                    <img src="{{ asset('images/customer_images/product_images') }}/{{ $selectedProduct->image }}" alt=" random imgee" class="w-full object-cover object-center rounded-lg shadow-md" style="height: 600px">
                </div>

                <div class="relative px-4 -mt-8">
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <div class="flex items-baseline">
                            <span class="bg-blue-200 text-blue-800 text-xs px-2 inline-block rounded-full  uppercase font-semibold tracking-wide">{{ $selectedProduct->created_at->diffForHumans() }}</span>

                            <div class="ml-2 text-gray-600 uppercase text-xs font-semibold tracking-wider">
                                {{ $selectedProduct->user->name }}
                            </div>
                        </div>

                        <h4 class="mt-1 text-xl font-semibold uppercase leading-tight truncate">{{ $selectedProduct->name }}</h4>

                        <div class="mt-1">
                            ₺{{ $selectedProduct->price }}
                        </div>

                        <div class="mt-4 flex items-center">
                            <span class="text-blue-600 text-md font-semibold">{{ $selectedProduct->number_of_likes }} {{ __('messages.product details card.people liked') }}</span>
                            <span class="text-md text-gray-600 ml-5">
                                <a href="{{ route('customerLikeProduct') }}" class="product-like-button">
                                    <i class="product-like-button-icon transition duration-300 far fa-heart not-liked"></i>
                                    ({{ __('messages.product details card.do you want to like') }})
                                </a>
                            </span>
                        </div>

                        <div class="mt-3">
                            <form action="{{ route('customerAddProductToCart', ['id' => $selectedProduct->id]) }}" method="POST" class="flex">
                                @csrf
                                <div class="flex justify-around items-center mr-2">
                                    <input type="hidden" id="selected-product-amount" value="{{ $selectedProduct->amount }}">
                                    <label class="reduce-the-amount mr-2 bg-gray-800 py-1 px-2 w-7 text-center cursor-pointer text-white font-bold rounded hover:bg-gray-700 transition duration-300">-</label>
                                    <input type="text" name="productAmount" id="selected-product-amount-text" class="bg-gray-500 w-14 p-1 text-white font-bold text-center rounded" value="0" readonly>
                                    <label class="increase-the-amount ml-2 bg-gray-800 py-1 px-2 w-7 text-center cursor-pointer text-white font-bold rounded hover:bg-gray-700 transition duration-300">+</label>
                                </div>
                                <button type="submit" class="add-basket-button bg-gray-500 text-white p-2 rounded hover:bg-gray-800 transition duration-300">
                                    <i class="fas fa-shopping-basket mr-2"></i>{{ __('messages.product details card.add shopping bag') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="product-properties">
            <div class="body p-20 md:w-full">
                <h3 class="text-blue-300 mb-4 md:text-2xl sm:text-md font-bold">
                    {{ __('messages.properties text.product properties') }}
                </h3>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <div class="mb-4">
                        <h2 class="text-2xl font-bold mb-2 text-gray-800">{{ __('messages.properties text.description') }}</h2>
                        <p class="text-gray-700">
                            {{ $selectedProduct->description }}
                        </p>
                    </div>

                    <div>
                        <h2 class="text-xl font-bold mb-2 text-gray-800 mb-2">{{ __('messages.properties text.properties') }}</h2>
                        <ul>
                            <li class="mb-2">{{ __('messages.properties text.product price') }}: <span class="font-bold">₺{{ $selectedProduct->price }}</span></li>
                            <li class="mb-2">{{ __('messages.properties text.product category') }}: <span class="font-bold">{{ $selectedProduct->category->name }}</span></li>
                            <li class="mb-2 flex">
                                {{ __('messages.properties text.product color') }}:
                                <div class="flex items-center">
                                    <span class="font-bold mr-2 ml-1">{{ $selectedProduct->color->name }}</span>
                                    <div class="rounded-3xl w-5 h-5" style="background-color: {{ $selectedProduct->color->hex_code }}"></div>
                                </div>
                            </li>
                            <li class="mb-2">{{ __('messages.properties text.product amount') }}: <span class="font-bold">{{ $selectedProduct->amount }}</span></li>
                        </ul>
                    </div>

                    @if(session('error-message'))
                        <div class="bg-red-700 p-2 rounded text-white text-center">
                            {{ session('error-message') }}
                        </div>
                    @elseif(session('success-message'))
                        <div class="bg-green-700 p-2 rounded text-white text-center">
                            {{ session('success-message') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection

@section('SpecialJs')
    <script src="{{ asset('styles/js/customer/product_details.js') }}"></script>
@endsection

<!--Random Picture Link = https://source.unsplash.com/random/350x350 -->
