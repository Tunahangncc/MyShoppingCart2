@extends('customers.layouts.master')

@section('title')
    <title>{{ __('messages.invisible links.login') }}</title>
@endsection

@section('SpecialCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/css/customer/login.css') }}">
@endsection


@section('content')

<div class="h-screen flex justify-center items-center">
    <div class="bg-white rounded-lg md:w-2/3 w-full px-16 py-16">
        <form action="#" method="POST">
            @csrf

            <div class="flex font-bold justify-center">
                <img class="h-20 w-20"
                    src="https://raw.githubusercontent.com/sefyudem/Responsive-Login-Form/master/img/avatar.svg">
            </div>

            <h2 class="text-3xl text-center text-gray-700 mb-4">{{ __('messages.login form text.welcome back') }}</h2>

            @error('email')
                <span class="text-sm text-red-400">{{ $message }}</span>
            @enderror
            <div class="input-div border-b-2 relative grid my-5 py-1 focus:outline-none"
                style="grid-template-columns: 7% 93%;">
                <div class="i">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="div">
                    <h5>{{ __('messages.login form text.email address') }}</h5>
                    <input 
                        type="email" 
                        class="absolute w-full h-full py-2 px-3 outline-none inset-0 text-gray-700"
                        style="background:none;"
                        name="email"
                    >
                </div>
            </div>

            @error('password')
            <span class="text-sm text-red-400">{{ $message }}</span>
            @enderror
            <div class="input-div border-b-2 relative grid my-5 py-1 focus:outline-none"
                style="grid-template-columns: 7% 93%;">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="div">
                    <h5>{{ __('messages.login form text.password') }}</h5>
                    <input 
                        type="password"
                        class="absolute w-full h-full py-2 px-3 outline-none inset-0 text-gray-700"
                        style="background:none;"
                        name="password"
                    >
                </div>
            </div>

            @if (session('error-message'))
                <div class="flex justify-center font-bold">
                    <span class="text-sm text-red-400">{{ session('error-message') }}</span>
                </div>
            @endif
            <button type="submit" class="w-full py-2 mb-3 rounded-full bg-green-600 text-gray-100  focus:outline-none">
                {{ __('messages.login form text.login') }}
            </button>

            <a href="{{ route('customerRegister') }}" class="md:text-lg text-sm text-green-400 hover:text-green-500 flex justify-center mb-4">
                {{ __('messages.login form text.text1') }}
            </a>
        </form>
    </div>
</div>

@endsection

@section('SpecialJs')
    <script src="{{ asset('styles/js/customer/login.js') }}"></script>
@endsection
