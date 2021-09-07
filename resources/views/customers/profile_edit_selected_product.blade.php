@extends('customers.layouts.master')

@section('title')
    <title>{{ __('messages.invisible links.profile edit product') }}</title>
@endsection

@section('SpecialCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/css/customer/profile.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/css/customer/profile_edit_selected_product.css') }}">
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

        <div class="profile-edit-product-form flex justify-center items-center w-2/4">
            <form class="w-full" method="POST" action="{{ route('customerProfileEditSelectedProductPut', ['id' => 2]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-product-name">
                            {{ __('messages.profile edit selected product form text.product name') }}
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-product-name" type="text" name="productName">
                        <p class="text-gray-600 text-xs italic">{{ __('messages.profile edit selected product form text.text1') }}</p>
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-product-brand">
                            {{ __('messages.profile edit selected product form text.product brand') }}
                        </label>
                        <div class="relative">
                            <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-product-brand" name="productBrand">
                                <option value="empty"></option>
                                <option>Samsung</option>
                                <option>LG</option>
                                <option>Nokia</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-product-price">
                            {{ __('messages.profile edit selected product form text.product price') }}
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" min="1" id="grid-product-price" value="1" type="number" name="productPrice">
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-product-amount">
                            {{ __('messages.profile edit selected product form text.product amount') }}
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" min="1" id="grid-product-amount" value="1" type="number" name="productAmount">
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-product-color-hex-code">
                            {{ __('messages.profile edit selected product form text.product color') }}
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-product-color-hex-code" type="color" name="productColorHex">
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-product-color-name">
                            {{ __('messages.profile edit selected product form text.color name') }}
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-product-color-name" type="text" name="productColorName">
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-product-description">
                            {{ __('messages.profile edit selected product form text.product description') }}
                        </label>
                        <textarea name="productDescription" id="grid-product-description" class="resize-y appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" style="max-height: 150px; min-height: 100px"></textarea>
                        <p class="text-gray-600 text-xs italic">{{ __('messages.profile edit selected product form text.text2') }}</p>
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-product-name">
                            {{ __('messages.profile edit selected product form text.product image') }}
                        </label>
                        <div class="flex justify-between items-center">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 flex" for="grid-product-image">
                                <svg class="w-8 h-8 mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                </svg>
                                <span class="mt-2 text-base leading-normal cursor-pointer">{{ __('messages.profile edit selected product form text.select a image') }}</span>
                            </label>
                            <input type='file' class="hidden" name="productImage" id="grid-product-image"/>
                            <img src="{{ asset('images/customer_images/general_images/product_no_image_selected.png') }}" alt="product picture" class="w-32 h-32 rounded">
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3 flex justify-between">
                        <button type="submit" class="bg-blue-300 p-2 text-white rounded-md hover:bg-blue-500 transition duration-300">
                            <i class="fas fa-edit mr-2"></i>{{ __('messages.profile edit selected product form text.edit product') }}
                        </button>

                        <a href="#" class="bg-blue-300 p-2 text-white rounded-md hover:bg-blue-500 transition duration-300">
                            <i class="fas fa-arrow-circle-left mr-2"></i>Go Back
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('SpecialJs')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
@endsection
