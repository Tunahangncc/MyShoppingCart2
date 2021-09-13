@extends('customers.layouts.master')

@section('title')
<title>{{ __('messages.invisible links.profile') }}</title>
@endsection

@section('SpecialCss')
<link rel="stylesheet" type="text/css" href="{{ asset('styles/css/customer/profile.css') }}">
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

    <div class="profile-card-area flex justify-center items-center">
        <div class="bg-gray-100 rounded-md">
            <div class="container mx-auto my-5 p-5">
                <div class="container-content md:flex no-wrap md:-mx-2 ">
                    <!-- Left Side -->
                    <div class="left-area w-full md:w-3/12 md:mx-2">
                        <!-- Profile Card -->
                        <div class="left-area-content bg-white p-3 border-t-4 border-green-400">
                            <div class="image overflow-hidden">
                                <img class="h-52 w-52 mx-auto" src="{{ asset('images/customer_images/profile_images') }}/{{ Auth::user()->images }}" alt="user image">
                            </div>

                            <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{ Auth::user()->name }}</h1>

                            <h3 class="text-gray-600 font-lg text-semibold leading-6 mt-2">{{ __('messages.profile card text.about me') }}</h3>

                            <p class="text-sm text-gray-500 hover:text-gray-600 leading-6">
                                {{ __('messages.profile card text.description') }}
                            </p>
                        </div>
                    </div>

                    <!-- Right Side -->
                    <div class="right-area w-full md:w-9/12 mx-2">
                        <!-- Profile tab -->
                        <!-- About Section -->
                        <div class="right-area-content bg-white p-3 shadow-sm rounded-sm h-full border-t-4 border-green-400">
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                                <span clas="text-green-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </span>

                                <span class="tracking-wide">{{ __('messages.profile card text.my personal information') }}</span>
                            </div>

                            <div class="text-gray-700">
                                <div class="grid md:grid-cols-2 text-sm">
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">{{ __('messages.profile card text.first name') }}</div>
                                        <div class="px-4 py-2">
                                            @if(count($nameArray) > 2)
                                                @for($i=0; $i<(count($nameArray)-1); $i++)
                                                    {{ $nameArray[$i] }}
                                                @endfor

                                            @else
                                                {{ $nameArray[0] }}
                                            @endif
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">{{ __('messages.profile card text.last name') }}</div>
                                        <div class="px-4 py-2">{{ $nameArray[count($nameArray) - 1] }}</div>
                                    </div>

                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">{{ __('messages.profile card text.gender') }}</div>
                                        <div class="px-4 py-2">{{ __('messages.profile card text.'.Auth::user()->gender) }}</div>
                                    </div>

                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">{{ __('messages.profile card text.phone number') }}</div>
                                        <div class="px-4 py-2">+90 507 345 6578</div>
                                    </div>

                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">{{ __('messages.profile card text.current address') }}</div>
                                        <div class="px-4 py-2">{{ __('messages.profile card text.not available') }}</div>
                                    </div>

                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold md:text-md sm:text-sm">{{ __('messages.profile card text.email') }}</div>
                                        <div class="px-4 py-2">
                                            <a class="text-blue-800" href="mailto:jane@example.com">{{ Auth::user()->email }}</a>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">{{ __('messages.profile card text.birthday') }}</div>
                                        <div class="px-4 py-2">Feb 06, 1998</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of about section -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('SpecialJs')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
@endsection
