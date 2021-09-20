@extends('admins.layouts.master')

@section('specialCSS')
    <link rel="stylesheet" href="{{ asset('styles/css/admin/profile_settings.css') }}">
@endsection

@section('title')
    <title>Profile Settings</title>
@endsection

@section('content')
    <?php
    $i = 0;
    $fullName = Auth::user()->name;
    $nameArray = explode(' ', $fullName);

    $adminDate = Auth::user()->date_of_birth;
    $dateArray = explode('/', $adminDate);
    ?>

    <div class="relative md:ml-64 bg-blueGray-50">
        <nav class="absolute top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-nowrap md:justify-start flex items-center p-4">
            <div class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4">
                <a class="text-white text-sm uppercase hidden lg:inline-block font-semibold" href="{{ route('adminDashboard') }}">{{ __('messages.profile settings page text.dashboard')}}</a>

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

        <div class="edit-my-account px-4 md:px-10 mx-auto w-full -m-24">
            <div class="flex flex-wrap">
                <div class="w-full lg:w-8/12 px-4">
                    <div
                        class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                        <div class="rounded-t bg-white mb-0 px-6 py-6">
                            <div class="text-center flex justify-between">
                                <h6 class="text-blueGray-700 text-xl font-bold">
                                    {{ __('messages.profile settings page text.my account')}}
                                </h6>
                            </div>
                        </div>
                        <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                            <form action="{{ route('adminProfileSettingsPut') }}" method="POST">
                                @csrf
                                @method('PUT')

                                <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">{{ __('messages.profile settings page text.user information')}}</h6>

                                <div class="flex flex-wrap">
                                    <div class="w-full lg:w-6/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                                                {{ __('messages.profile settings page text.admin type')}}
                                            </label>

                                            <input  type="text"
                                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                    value="{{ $adminInformation->type }}"
                                                    name="type"/>
                                        </div>
                                    </div>

                                    <div class="w-full lg:w-6/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                                                {{ __('messages.profile settings page text.email address')}}
                                            </label>

                                            <input  type="email"
                                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                    value="{{ $adminInformation->user->email }}"
                                                    name="email"/>
                                        </div>
                                    </div>

                                    <div class="w-full lg:w-6/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                                                {{ __('messages.profile settings page text.first name')}}
                                            </label>

                                            <input  type="text"
                                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                    value="@if(count($nameArray) > 2) @for($i=0; $i<(count($nameArray)-1); $i++){{ $nameArray[$i] }}@endfor @else {{ $nameArray[0] }} @endif"
                                                    name="firstName"/>
                                        </div>
                                    </div>
                                    <div class="w-full lg:w-6/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                                                {{ __('messages.profile settings page text.last name')}}
                                            </label>

                                            <input  type="text"
                                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                    value="{{ $nameArray[count($nameArray) - 1] }}"
                                                    name="lastName"/>
                                        </div>
                                    </div>

                                    <div class="w-full lg:w-6/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                                                {{ __('messages.profile settings page text.gender')}}
                                            </label>

                                            <select name="gender"
                                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                <option value="male">{{ __('messages.profile settings page text.male') }}</option>
                                                <option value="">{{ __('messages.profile settings page text.female') }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="w-full lg:w-6/12 px-4"></div>

                                    <div class="w-full lg:w-4/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                                                {{ __('messages.profile settings page text.year')}}
                                            </label>

                                            <input  type="number" max="{{ date('Y') }}"
                                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                    name="year"
                                                    value="{{ $dateArray[2] }}"/>
                                        </div>
                                    </div>
                                    <div class="w-full lg:w-4/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                                                {{ __('messages.profile settings page text.month')}}
                                            </label>

                                            <select name="month"
                                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                <option value="{{ $dateArray[1] }}">{{ getMonthName($dateArray[1]) }}</option>
                                                @foreach($months as $montKey => $month)
                                                    @if($montKey != $dateArray[1])
                                                        <option value="{{ $montKey }}">{{ $month }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="w-full lg:w-4/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                                                {{ __('messages.profile settings page text.day')}}
                                            </label>

                                            <input  type="number" max="30"
                                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                    name="day"
                                                    value="{{ $dateArray[0] }}"/>
                                        </div>
                                    </div>

                                    <div class="w-full lg:w-6/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                                                {{ __('messages.profile settings page text.old password')}}
                                            </label>

                                            <input  type="password"
                                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                    name="oldPassword"
                                                    />
                                        </div>
                                    </div>
                                    <div class="w-full lg:w-6/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                                                {{ __('messages.profile settings page text.new password')}}
                                            </label>

                                            <input  type="password"
                                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                    name="newPassword"
                                                    />
                                        </div>
                                    </div>
                                </div>

                                <hr class="mt-6 border-b-1 border-blueGray-300" />

                                <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">{{ __('messages.profile settings page text.contact information')}}</h6>

                                <div class="flex flex-wrap">
                                    <div class="w-full lg:w-6/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                                                {{ __('messages.profile settings page text.neighbourhood')}}
                                            </label>
                                            <input  type="text"
                                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                    value="{{ $adminInformation->user->address->neighbourhood }}"
                                                    name="neighbourhood"/>
                                        </div>
                                    </div>

                                    <div class="w-full lg:w-6/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                                                {{ __('messages.profile settings page text.district')}}
                                            </label>
                                            <input  type="text"
                                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                    value="{{ $adminInformation->user->address->district }}"
                                                    name="district"/>
                                        </div>
                                    </div>
                                </div>

                                <hr class="mt-6 border-b-1 border-blueGray-300" />

                                <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">{{ __('messages.profile settings page text.about information')}}</h6>

                                <div class="flex flex-wrap">
                                    <div class="w-full lg:w-12/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                                                {{ __('messages.profile settings page text.about me')}}
                                            </label>

                                            <textarea  type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" name="aboutMe" style="max-height: 200px; min-width: 100%; max-width: 100%; min-height: 100px">{{ $adminInformation->about }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex">
                                    <button
                                        class="mr-2 bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                                        type="submit">
                                        <i class="fas fa-edit mr-2"></i>{{ __('messages.profile settings page text.update profile')}}
                                    </button>
                                    @if(session('success-message'))
                                        <span class="success-message-span">{{ __('messages.profile settings page text.'.session('success-message')) }}</span>
                                    @elseif(session('error-message'))
                                        <span class="error-message-span">{{ __('messages.profile settings page text.'.session('error-message')) }}</span>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-4/12 px-4">
                    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg mt-16">
                        <div class="px-6">
                            <div class="flex flex-wrap justify-center">
                                <div class="w-full px-4 flex justify-center">
                                    <div class="relative">
                                        <img alt="..." src="{{ asset('images/admin_images/profile_images/'.Auth::user()->images) }}" class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px" />
                                    </div>
                                </div>

                                <div class="w-full px-4 text-center mt-20"></div>
                            </div>
                            <div class="text-center mt-12">
                                <h3 class="text-xl font-semibold leading-normal mb-2 text-blueGray-700 mb-2">
                                    {{ $adminInformation->user->name }}
                                </h3>

                                <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
                                    <i class="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400"></i>
                                    {{ $adminInformation->user->address->neighbourhood }}, {{ $adminInformation->user->address->district }}
                                </div>

                                <div class="mb-2 text-blueGray-600 mt-10">
                                    <i class="fas fa-briefcase mr-2 text-lg text-blueGray-400"></i>
                                    {{ $adminInformation->type }} / {{ $adminInformation->status }}
                                </div>
                                <div class="mb-2 text-blueGray-600 mt-10">
                                    <i class="fas fa-briefcase mr-2 text-lg text-blueGray-400"></i>
                                    {{ $adminInformation->user->gender }}
                                </div>
                                <div class="mb-2 text-blueGray-600 mt-10">
                                    <i class="fas fa-briefcase mr-2 text-lg text-blueGray-400"></i>
                                    {{ $dateArray[2] }} / {{ getMonthName($dateArray[1]) }} / {{ $dateArray[0] }}
                                </div>
                            </div>
                            <div class="mt-10 py-10 border-t border-blueGray-200 text-center">
                                <div class="flex flex-wrap justify-center">
                                    <div class="w-full lg:w-9/12 px-4">
                                        <p class="mb-4 text-lg leading-relaxed text-blueGray-700">
                                            {{ $adminInformation->about }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('admins.widgets.footer')
        </div>
    </div>
@endsection
