@extends('customers.layouts.master')

@section('title')
    <title>{{ __('messages.invisible links.profile message box') }}</title>
@endsection

@section('SpecialCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/css/customer/profile.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/css/customer/profile_message_box.css') }}">
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

        <div class="profile-message-box-area flex justify-center items-center">
            <div class="grid-products-table-area grid grid-cols-1 mb-3">
                <div class="default-table">
                    <table class="table-fixed border-collapse">
                        <thead>
                        <tr>
                            <th class="w-96 border border-gray-800">{{ __('messages.profile message box text.message name') }}</th>
                            <th class="w-96 border border-gray-800">{{ __('messages.profile message box text.message body') }}</th>
                            <th class="w-96 border border-gray-800">{{ __('messages.profile message box text.message type') }}</th>
                            <th class="w-52 border border-gray-800">{{ __('messages.profile message box text.realised time') }}</th>
                            <th class="w-52 border border-gray-800">{{ __('messages.profile message box text.mark as read') }}</th>
                            <th class="w-52 border border-gray-800">{{ __('messages.profile message box text.delete message') }}</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <td class="border border-gray-800" align="center">Inappropriate product</td>
                            <td class="border border-gray-800" align="center">This product contains inappropriate information for the site.</td>
                            <td class="border border-gray-800" align="center">WARNING</td>
                            <td class="border border-gray-800" align="center">50 minute ago</td>
                            <td class="border border-gray-800" align="center">
                                <a href="{{ route('customerProfileEditSelectedProduct', ['id' => 2]) }}" class="bg-green-500 text-white transition duration-300 hover:bg-green-700 p-2 rounded-md"><i class="fas fa-check-circle"></i></a>
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

                <div class="mobile-table hidden">
                    <table class="table-fixed border-collapse">
                        <tr>
                            <td class="table-row-head w-96 border border-gray-800">{{ __('messages.profile message box text.message name') }}</td>
                            <td class="w-96 border border-gray-800">Inappropriate Product</td>
                        </tr>

                        <tr>
                            <td class="table-row-head w-96 border border-gray-800">{{ __('messages.profile message box text.message body') }}</td>
                            <td class="w-96 border border-gray-800">This product contains inappropriate information for the site.</td>
                        </tr>

                        <tr>
                            <td class="table-row-head w-96 border border-gray-800">{{ __('messages.profile message box text.message type') }}</td>
                            <td class="w-96 border border-gray-800">WARNING</td>
                        </tr>

                        <tr>
                            <td class="table-row-head w-96 border border-gray-800">{{ __('messages.profile message box text.realised time') }}</td>
                            <td class="w-96 border border-gray-800">50 Minute Ago</td>
                        </tr>

                        <tr>
                            <td class="table-row-head w-96 border border-gray-800">{{ __('messages.profile message box text.mark as read') }}</td>
                            <td class="w-96 border border-gray-800" align="center">
                                <a href="{{ route('customerProfileMessageBoxReadMessage', ['id' => 2]) }}" class="bg-green-500 text-white transition duration-300 hover:bg-green-700 p-2 rounded-md">
                                    <i class="fas fa-check-circle"></i>
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td class="table-row-head w-96 border border-gray-800">{{ __('messages.profile message box text.delete message') }}</td>
                            <td class="w-96 border border-gray-800" align="center">
                                <form action="{{ route('customerProfileMessageBoxMessageDelete', ['id' => 2]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="bg-red-500 text-white transition duration-300 hover:bg-red-700 p-2 rounded-md">
                                        <i class="fas fa-minus-circle"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('SpecialJs')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
@endsection
