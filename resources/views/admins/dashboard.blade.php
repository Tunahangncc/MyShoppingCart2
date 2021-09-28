@extends('admins.layouts.master')

@section('specialCSS')
    <link rel="stylesheet" href="{{ asset('styles/css/admin/dashboard.css') }}">
@endsection

@section('title')
    <title>Dashboard</title>
@endsection

@section('content')
    <div class="relative md:ml-64 bg-blueGray-50">
        <nav class="absolute top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-nowrap md:justify-start flex items-center p-4">
            <div class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4">
                <a class="text-white text-sm uppercase hidden lg:inline-block font-semibold" href="{{ route('adminDashboard') }}">{{ __('messages.dashboard page text.dashboard') }}</a>

                <ul class="flex-col md:flex-row list-none items-center hidden md:flex">
                    <a class="text-blueGray-500 block" href="#pablo" onclick="openDropdown(event,'user-dropdown')">
                        <div class="items-center flex">
                                <span class="w-12 h-12 text-sm text-white bg-blueGray-200 inline-flex items-center justify-center rounded-full">
                                    <img alt="admin image" class="w-full rounded-full align-middle border-none shadow-lg" src="{{ asset('images/admin_images/profile_images/'.Auth::user()->images) }}"/>
                                </span>
                        </div>
                    </a>
                </ul>
            </div>
        </nav>

        <!-- Header -->
        <div class="relative bg-pink-600 md:pt-32 pb-32 pt-12">
            <div class="px-4 md:px-10 mx-auto w-full">
                <div>
                    @include('admins.widgets.card_stats')
                </div>
            </div>
        </div>

        <div class="px-4 md:px-10 mx-auto w-full -m-24">
            <div class="flex flex-wrap mt-4">
                <div class="w-full xl:w-8/12 mb-12 xl:mb-0 px-4">
                    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                        <div class="rounded-t mb-0 px-4 py-3 border-0">
                            <div class="flex flex-wrap items-center">
                                <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                                    <h3 class="font-semibold text-base text-blueGray-700">{{ __('messages.dashboard page text.top users') }}</h3>
                                </div>
                            </div>
                        </div>

                        <div class="block w-full overflow-x-auto">
                            <!-- Projects table -->
                            <table class="user-table items-center w-full bg-transparent border-collapse">
                                <thead>
                                <tr>
                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        {{ __('messages.dashboard page text.user table.user name') }}
                                    </th>
                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        {{ __('messages.dashboard page text.user table.user email') }}
                                    </th>
                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        {{ __('messages.dashboard page text.user table.number of products added') }}
                                    </th>
                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        {{ __('messages.dashboard page text.user table.show user') }}
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($topUsers as $topUser)
                                    <tr>
                                        <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                            {{ $topUser->user->name }}
                                        </th>
                                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            {{ $topUser->user->email }}
                                        </td>
                                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            {{ getMyProductCount($topUser->user->id)->productCount }}
                                        </td>
                                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            <a href="{{ route('adminCustomerProfilePage', ['id' => $topUser->user->id]) }}" class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none ease-linear transition-all duration-150">
                                                <i class="fas fa-eye mr-2"></i>{{ __('messages.dashboard page text.user table.show user') }}
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="w-full xl:w-4/12 px-4">
                    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                        <div class="rounded-t mb-0 px-4 py-3 border-0">
                            <div class="flex flex-wrap items-center">
                                <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                                    <h3 class="font-semibold text-base text-blueGray-700">{{ __('messages.dashboard page text.top products') }}</h3>
                                </div>
                            </div>
                        </div>

                        <div class="block w-full overflow-x-auto">
                            <!-- Projects table -->
                            <table class="product-table items-center w-full bg-transparent border-collapse">
                                <thead class="thead-light">
                                <tr>
                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        {{ __('messages.dashboard page text.product table.product name') }}
                                    </th>
                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        {{ __('messages.dashboard page text.product table.number of likes') }}
                                    </th>
                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($topProducts as $topProduct)
                                    <tr>
                                        <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                            {{ $topProduct->name }}
                                        </th>
                                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            {{ $topProduct->number_of_likes }}
                                        </td>
                                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            <div class="flex items-center">
                                                <a href="{{ route('adminSelectedProductDetails', ['id' => $topProduct->id]) }}" class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none ease-linear transition-all duration-150">
                                                    <i class="fas fa-eye mr-2"></i>{{ __('messages.dashboard page text.product table.show product') }}
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            @include('admins.widgets.footer')
        </div>
    </div>
@endsection
