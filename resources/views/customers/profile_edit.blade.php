@extends('customers.layouts.master')

@section('title')
    <title>{{ __('messages.invisible links.profile') }}</title>
@endsection

@section('SpecialCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/css/customer/profile.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/css/customer/profile_edit.css') }}">
@endsection


@section('content')

    <?php
    $i = 0;
    $fullName = Auth::user()->name;
    $nameArray = explode(' ', $fullName);
    ?>

    <div class="profile-content-area profile-edit-area flex justify-around">
        <div class="profile-categories mt-6">
            @include('customers.widgets.profile_category')
        </div>

        <div class="profile-edit-form flex items-center justify-center p-4">
            <form class="space-y-4 text-gray-700" method="POST" action="{{ route('customerProfileEditPut') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="flex flex-wrap">
                    <div class="w-full">
                        <label class="block mb-1" for="user_email">{{ __('messages.profile edit form text.email') }}</label>
                        <input class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" id="user_email" value="{{ Auth::user()->email }}" name="email"/>
                    </div>
                </div>

                <div class="flex flex-wrap -mx-2 space-y-4 md:space-y-0">
                    <div class="w-full px-2 md:w-1/2">
                        <label class="block mb-1" for="user_first_name">{{ __('messages.profile edit form text.first name') }}</label>
                        <input
                            class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline"
                            type="text"
                            id="user_first_name"
                            value="@if(count($nameArray) > 2) @for($i=0; $i<(count($nameArray)-1); $i++) {{ $nameArray[$i] }} @endfor @else {{ $nameArray[0] }} @endif"
                            name="firstName"/>
                    </div>

                    <div class="w-full px-2 md:w-1/2">
                        <label class="block mb-1" for="user_last_name">{{ __('messages.profile edit form text.last name') }}</label>
                        <input class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" id="user_last_name" value="{{ $nameArray[count($nameArray) - 1] }}" name="lastName"/>
                    </div>
                </div>

                <div class="flex flex-wrap -mx-2 space-y-4 md:space-y-0">
                    <div class="w-full px-2 md:w-1/2">
                        <label class="block mb-1" for="user_old_password">{{ __('messages.profile edit form text.old password') }}</label>
                        <input class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="password" id="user_old_password" name="oldPassword"/>
                    </div>

                    <div class="w-full px-2 md:w-1/2">
                        <label class="block mb-1" for="user_new_password">{{ __('messages.profile edit form text.new password') }}</label>
                        <input class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" id="user_new_password" name="newPassword"/>
                    </div>
                </div>

                <div class="flex flex-wrap">
                    <div class="w-full">
                        <label class="block mb-1" for="gender">{{ __('messages.profile edit form text.gender') }}</label>
                        <div class="flex justify-around">
                            <label class="text-gray-700">
                                <input type="radio" value="male" name="gender" @if(Auth::user()->gender == 'male') checked @endif/>
                                <span class="ml-1">{{ __('messages.profile edit form text.male') }}</span>
                            </label>
                            <label class="text-gray-700">
                                <input type="radio" value="female" name="gender" @if(Auth::user()->gender == 'female') checked @endif/>
                                <span class="ml-1">{{ __('messages.profile edit form text.female') }}</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap">
                    <div class="w-full">
                        <label class="block mb-1" for="image">{{ __('messages.profile edit form text.avatar image') }}</label>
                        <div class="flex justify-around">
                            <label class="w-full flex flex-col items-center transition duration-300 bg-white text-blue-500 rounded-lg tracking-wide uppercase border cursor-pointer hover:bg-blue-500 hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                                </svg>
                                <span class="mt-2 text-base leading-normal">{{ __('messages.profile edit form text.select a avatar') }}</span>
                                <input type='file' class="hidden" name="image"/>
                            </label>

                            <label class="w-full flex flex-col items-center justify-center">
                                {{ Auth::user()->images }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap -mx-2 space-y-4 md:space-y-0">
                    <div class="w-full px-2 md:w-1/3">
                        <label class="block mb-1" for="user_birthday_day">{{ __('messages.profile edit form text.day') }}</label>
                        <input class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="number" min="1" max="31" id="user_birthday_day" value="1" name="day"/>
                    </div>

                    <div class="w-full px-2 md:w-1/3">
                        <label class="block mb-1" for="user_birthday_month">{{ __('messages.profile edit form text.month') }}</label>
                        <select class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline">
                            @foreach($months as $monthKey => $month)
                                <option value="{{ $monthKey }}">{{ $month }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="w-full px-2 md:w-1/3">
                        <label class="block mb-1" for="user_birthday_year">{{ __('messages.profile edit form text.year') }}</label>
                        <input class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="number" min="1975" max="{{ date('Y') }}" id="user_birthday_year" value="1975" name="year"/>
                    </div>
                </div>

                <div class="flex flex-wrap -mx-2 space-y-4 md:space-y-0">
                    <div class="w-full px-2 md:w-1/3">
                        <button type="submit" class="bg-blue-500 text-white transition duration-300 hover:bg-blue-700 p-2 rounded-md">
                            <i class="fas fa-edit mr-2"></i>Edit Profile
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('SpecialJs')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
@endsection
