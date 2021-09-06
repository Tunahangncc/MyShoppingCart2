@extends('customers.layouts.master')

@section('title')
    <title>{{ __('messages.invisible links.login') }}</title>
@endsection

@section('SpecialCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/css/customer/register.css') }}">
@endsection


@section('content')

<div class="h-screen flex justify-center items-center md:mb-10">
    <div class="bg-white rounded-lg md:w-2/3 w-full px-16 py-16">
        <form action="#" method="POST">
            @csrf

            <div class="flex font-bold justify-center">
                <img class="h-20 w-20"
                    src="https://raw.githubusercontent.com/sefyudem/Responsive-Login-Form/master/img/avatar.svg">
            </div>

            <h2 class="text-3xl text-center text-gray-700 mb-4">{{ __('messages.register form text.welcome to the club') }}</h2>

            <div class="input-div border-b-2 relative grid my-5 py-1 focus:outline-none" style="grid-template-columns: 7% 93%;">
                <div class="i">
                    <i class="fas fa-signature"></i>
                </div>

                <div class="div">
                    <h5>{{ __('messages.register form text.first name') }}</h5>
                    <input 
                        type="text" 
                        class="absolute w-full h-full py-2 px-3 outline-none inset-0 text-gray-700"
                        style="background:none;"
                        name="firstName"
                    >
                </div>
            </div>

            <div class="input-div border-b-2 relative grid my-5 py-1 focus:outline-none" style="grid-template-columns: 7% 93%;">
                <div class="i">
                    <i class="fas fa-signature"></i>
                </div>

                <div class="div">
                    <h5>{{ __('messages.register form text.last name') }}</h5>
                    <input 
                        type="text" 
                        class="absolute w-full h-full py-2 px-3 outline-none inset-0 text-gray-700"
                        style="background:none;"
                        name="lastName"
                    >
                </div>
            </div>

            <div class="input-div border-b-2 relative grid my-5 py-1 focus:outline-none" style="grid-template-columns: 7% 93%;">
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

            <div class="input-div border-b-2 relative grid my-5 py-1 focus:outline-none" style="grid-template-columns: 7% 93%;">
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
            
            <div class="input-div border-b-2 relative grid my-5 py-1 focus:outline-none" style="grid-template-columns: 7% 93%;">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>

                <div class="div">
                    <h5>{{ __('messages.register form text.confirm password') }}</h5>
                    <input 
                        type="text" 
                        class="absolute w-full h-full py-2 px-3 outline-none inset-0 text-gray-700"
                        style="background:none;"
                        name="confirmPassword"
                    >
                </div>
            </div>

            <div class="input-div border-b-2 relative grid my-5 py-1 focus:outline-none" style="grid-template-columns: 7% 93%;">
                <div class="i">
                    <i class="fas fa-venus-mars"></i>
                </div>

                <div class="div">
                    <select 
                        name="gender" 
                        style="background:none;" 
                        class="absolute w-full h-full py-2 px-3 outline-none inset-0 text-gray-700"
                    >
                        <option value="gender" selected>{{ __('messages.register form text.gender') }}</option>
                        <option value="male">{{ __('messages.register form text.male') }}</option>
                        <option value="female">{{ __('messages.register form text.female') }}</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="w-full py-2 mb-3 rounded-full bg-green-600 text-gray-100  focus:outline-none">
                {{ __('messages.register form text.sign up') }}
            </button>

            <a href="{{ route('customerLogin') }}" class="md:text-lg text-sm text-green-400 hover:text-green-500 flex justify-center mb-4">
                {{ __('messages.register form text.text1') }}
            </a>
        </form>
    </div>
</div>

@endsection

@section('SpecialJs')
    <script src="{{ asset('styles/js/customer/register.js') }}"></script>
@endsection
