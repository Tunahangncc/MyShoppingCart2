<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

@yield('title')

<!--CSS-->
    <link href="{{ asset('styles/css/customer/app.css') }}" rel="stylesheet">
    <link href="{{ asset('styles/css/min_css/tailwind.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{ asset('styles/css/customer/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/css/customer/header.css') }}">
    @yield('SpecialCss')
<!---->

</head>
<body>

<div class="navbar-area">
    <nav class="bg-gray-100">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between">
                <div class="flex space-x-4">
                    <!--LOGO-->
                    <div>
                        <a href="{{ route('customerHome') }}" class="flex items-center py-5 px-2 text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                            </svg>
                            <span class="font-bold">My Shopping Cart</span>
                        </a>
                    </div>

                    <!--Main Nav-->
                    <div class="main-nav hidden md:flex items-center space-x-1">
                        <a href="{{ route('customerHome') }}" class="py-5 px-3 text-gray-700 hover:text-gray-900">{{ __('messages.navbar content text.links.home') }}</a>
                        <a href="{{ route('customerProducts') }}" class="py-5 px-3 text-gray-700 hover:text-gray-900">{{ __('messages.navbar content text.links.products') }}</a>
                        <a href="{{ route('customerAboutUs') }}" class="py-5 px-3 text-gray-700 hover:text-gray-900">{{ __('messages.navbar content text.links.about') }}</a>
                        <a href="{{ route('customerContact') }}" class="py-5 px-3 text-gray-700 hover:text-gray-900">{{ __('messages.navbar content text.links.contact') }}</a>
                        <a href="#">
                            <ul class="lang-list">
                                <li class="drop-two-nav">
                                    <a href="#" class="py-5 px-3 text-gray-700 hover:text-gray-900">{{ __('messages.navbar content text.links.language') }} - {{ Str::upper(App::getLocale()) }}<span><i class="fas fa-chevron-down ml-2"></i></span></a>

                                    <ul class="menu-two-nav">
                                        @foreach(Config::get('languages') as $lang => $language)
                                            @if($lang != App::getLocale())
                                                <a href="{{ route('lang.switch', $lang) }}">{{ $language }}</a>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </a>
                    </div>
                </div>

                <!--Auth Nav-->
                @guest
                    <div class="auth-nav hidden md:flex items-center space-x-1">
                        <a href="{{ route('customerLogin') }}" class="py-5 px-3">{{ __('messages.navbar content text.authentication button.login') }}</a>
                        <a href="{{ route('customerRegister') }}" class="py-2 px-3 bg-yellow-400 hover:bg-yellow-300 text-yellow-900 hover:text-yellow-800 rounded transition duration-300">{{ __('messages.navbar content text.authentication button.sign up') }}</a>
                    </div>
                @else
                    <div class="auth-nav hidden md:flex items-center space-x-1">
                        <a href="{{ route('customerProfile') }}" class="py-5 px-3">
                            <i class="fas fa-user-circle mr-2"></i>{{ Auth::user()->name }}
                        </a>
                        <a href="{{ route('SignOut') }}" class="py-2 px-3">
                            <i class="fas fa-sign-out-alt mr-2"></i>{{ __('messages.navbar content text.authentication button.sign out') }}
                        </a>
                    </div>
                @endguest

                <!--Mobile Button-->
                <div class="mobile-button md:hidden flex items-center">
                    <button class="mobile-menu-button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>

            </div>
        </div>

        <!--Mobile Menu-->
        <div class="mobile-menu hidden md:hidden">
            <a href="{{ route('customerHome') }}" class="block py-2 px-4 text-sm hover:bg-gray-200">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                    </svg>
                    {{ __('messages.navbar content text.links.home') }}
                </div>
            </a>

            <a href="{{ route('customerProducts') }}" class="block py-2 px-4 text-sm hover:bg-gray-200">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                    </svg>
                    {{ __('messages.navbar content text.links.products') }}
                </div>
            </a>

            <a href="{{ route('customerAboutUs') }}" class="block py-2 px-4 text-sm hover:bg-gray-200">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                    {{ __('messages.navbar content text.links.about') }}
                </div>
            </a>

            <a href="{{ route('customerContact') }}" class="block py-2 px-4 text-sm hover:bg-gray-200">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd" />
                    </svg>
                    {{ __('messages.navbar content text.links.contact') }}
                </div>
            </a>

            <a href="#">
                <div class="flex items-center">
                    <ul class="lang-list">
                        <li class="drop-two-nav">
                            <a href="#" class="py-5 px-3 text-gray-700 hover:text-gray-900"><i class="fas fa-language"></i>{{ __('messages.navbar content text.links.language') }} - {{ Str::upper(App::getLocale()) }}<span><i class="fas fa-chevron-down ml-2"></i></span></a>

                            <ul class="menu-two-nav">
                                @foreach(Config::get('languages') as $lang => $language)
                                    @if($lang != App::getLocale())
                                        <a class="p-0" href="{{ route('lang.switch', $lang) }}">{{ $language }}</a>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </div>
            </a>

            @guest
                <a href="{{ route('customerLogin') }}" class="block py-2 px-4 text-sm hover:bg-gray-200">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        {{ __('messages.navbar content text.authentication button.login') }}
                    </div>
                </a>

                <a href="{{ route('customerRegister') }}" class="block py-2 px-4 text-sm hover:bg-gray-200">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                        </svg>
                        {{ __('messages.navbar content text.authentication button.sign up') }}
                    </div>
                </a>
            @else
                <a href="{{ route('customerProfile') }}" class="block py-2 px-4 text-sm hover:bg-gray-200">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                          </svg>
                        {{ Auth::user()->name }}
                    </div>
                </a>

                <a href="{{ route('SignOut') }}" class="block py-2 px-4 text-sm hover:bg-gray-200">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd" />
                          </svg>
                        {{ __('messages.navbar content text.authentication button.sign out') }}
                    </div>
                </a>
            @endguest
        </div>
    </nav>
</div>
