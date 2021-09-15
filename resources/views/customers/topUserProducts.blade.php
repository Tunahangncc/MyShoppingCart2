@extends('customers.layouts.master')

@section('title')
    <title>{{ __('messages.navbar content text.links.top user products') }}</title>
@endsection

@section('SpecialCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/css/customer/products.css') }}">
@endsection


@section('content')

    <div class="flex flex-col">
        <div class="products-area md:p-10">
            <div class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1">
                @foreach($products as $product)
                    <div class="product-card container mx-auto max-w-sm w-80 mb-6 bg-white rounded-xl shadow-lg hover:scale-105 hover:shadow-2xl transform transition-all duration-500">
                        <div class="flex items-center justify-between px-4">
                            <div class="flex justify-between items-center py-4">
                                <img class="w-12 rounded-full" src="{{ asset('images/customer_images/profile_images') }}/{{ $product->user->images }}" alt="user image" />

                                <div class="ml-3">
                                    <h1 class="text-xl font-bold text-gray-800 cursor-pointer">{{ $product->user->name }}</h1>
                                    <p class="text-sm text-gray-800 hover:underline cursor-pointer">{{ $product->created_at->diffForHumans() }}</p>
                                </div>
                            </div>

                            <div>
                                <i class="product-card-top-right-circle fas fa-circle-notch transition duration-300"></i>
                            </div>
                        </div>

                        <img src="{{ asset('images/customer_images/product_images') }}/{{ $product->image }}" alt="product image">

                        <div class="p-6">
                            <h1 class="text-3xl font-bold text-gray-800">{{ $product->name }}</h1>

                            <h2 class="text-xl text-gray-800 font-semibold">{{ __('messages.card text.product description') }}</h2>

                            <p class="text-lg font font-thin mb-5">{{ $product->description }}</p>

                            <a href="{{ route('customerProductDetails', ['id' => $product->id]) }}" class="show-product-details-button bg-gradient-to-r from-blue-400 to-blue-700 p-2 text-white rounded transition duration-300">
                                <i class="fas fa-search"></i>
                                {{ __('messages.card text.show details') }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="product-paginate-links">
                <span class="flex items-center text-gray-600">Showing {{ $productCount }} unique products</span> {{ $products->links() }}
            </div>
        </div>
    </div>

@endsection

@section('SpecialJs')
    <script src="{{ asset('styles/js/customer/category.js') }}"></script>
@endsection
