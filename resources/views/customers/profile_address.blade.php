@extends('customers.layouts.master')

@section('title')
    <title>{{ __('messages.invisible links.profile') }}</title>
@endsection

@section('SpecialCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/css/customer/profile.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/css/customer/profile_address.css') }}">
@endsection


@section('content')

    <?php
    use Illuminate\Support\Str;
    $i = 0;
    $fullName = Auth::user()->name;
    $nameArray = explode(' ', $fullName);

    $userAddressInformation = getAddressInformation(Auth::user()->id);
    ?>

    <div class="profile-content-area profile-address-area flex justify-around">
        <div class="profile-categories mt-6">
            @include('customers.widgets.profile_category')
        </div>

        <div class="profile-address-form flex items-center justify-center p-4">
            <form class="space-y-4 text-gray-700" method="POST" action="{{ route('customerProfileEditAddress') }}">
                @csrf
                @method('PUT')

                <div class="flex flex-wrap">
                    <div class="w-full">
                        <label class="block mb-1" for="user_city">{{ __('messages.profile address form text.city') }}</label>
                        <input class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" id="user_city" name="city" value="{{ $userAddressInformation->neighbourhood }}"/>
                    </div>
                </div>

                <div class="flex flex-wrap">
                    <div class="w-full">
                        <label class="block mb-1" for="user_district">{{ __('messages.profile address form text.district') }}</label>
                        <select class="w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline" name="district">
                            <option value="{{ Str::slug($userAddressInformation->district, '-') }}" selected>{{ $userAddressInformation->district }}</option>
                            @foreach($districts as $district)
                                @if($district != $userAddressInformation->district)
                                    <option value="{{ Str::slug($district, '-') }}">{{ $district }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="flex flex-wrap">
                    <div class="w-full flex">
                        <button type="submit" class="bg-blue-500 mr-2 text-white p-2 transition duration-300 hover:bg-blue-700 rounded-md">
                            <i class="fas fa-edit mr-2"></i>{{ __('messages.profile address form text.edit address') }}
                        </button>

                        @if(session('success-message'))
                            <span class="bg-green-700 text-white p-2 rounded">{{ session('success-message') }}</span>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('SpecialJs')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
@endsection
