@extends('customers.layouts.master')

@section('title')
    <title>{{ __('messages.invisible links.profile edit product') }}</title>
@endsection

@section('SpecialCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/css/customer/profile.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/css/customer/profile_edit_product.css') }}">
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

        <div class="profile-edit-product-area flex justify-center items-center">
            <div class="grid-products-table-area grid grid-cols-1 mb-3">
                <div class="table-area-title">
                    <label class="font-bold text-xl">{{ __('messages.profile edit products text.my products') }}</label>
                </div>

                <div class="table-area-table">
                    <table class="table-fixed border-collapse">
                        <thead>
                        <tr>
                            <th class="w-96 border border-gray-800">{{ __('messages.profile edit products text.product name') }}</th>
                            <th class="w-96 border border-gray-800">{{ __('messages.profile edit products text.product brand') }}</th>
                            <th class="w-96 border border-gray-800">{{ __('messages.profile edit products text.product image') }}</th>
                            <th class="w-52 border border-gray-800">{{ __('messages.profile edit products text.edit product') }}</th>
                            <th class="w-52 border border-gray-800">{{ __('messages.profile edit products text.delete product') }}</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <td class="border border-gray-800" align="center">Galaxy A30</td>
                            <td class="border border-gray-800" align="center">SAMSUNG</td>
                            <td class="border border-gray-800" align="center"><img src="https://freepngimg.com/thumb/computer%20mouse/28-pc-mouse-png-image.png" alt="product image" class="w-20 h-20"></td>
                            <td class="border border-gray-800" align="center">
                                <a href="{{ route('customerProfileEditSelectedProduct', ['id' => 2]) }}" class="bg-blue-500 text-white transition duration-300 hover:bg-blue-700 p-2 rounded-md"><i class="fas fa-edit"></i></a>
                            </td>
                            <td class="border border-gray-800" align="center">
                                <form action="{{ route('customerProfileDeleteProduct', ['id' => 2]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="bg-red-500 text-white transition duration-300 hover:bg-red-700 p-2 rounded-md"><i class="fas fa-minus-circle"></i></button>
                                </form>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('SpecialJs')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
@endsection
