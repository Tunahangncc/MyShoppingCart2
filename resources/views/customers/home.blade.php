@extends('customers.layouts.master')

@section('title')
    <title>{{ __('messages.navbar content text.links.home') }}</title>
@endsection

@section('SpecialCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/css/customer/home.css') }}">
@endsection


@section('content')
<!--{{ asset('images/customer_images/general_images/header.png') }}-->
    <div class="content-area">
        <div class="grid grid-cols-1">
            <div class="w-full h-full bg-no-repeat bg-cover" style="background: url('{{ asset('images/customer_images/general_images/header.png') }}'); background-position-y: -790px; background-position-x: center;">
                <div class="grid md:grid-cols-2 sm:grid-cols-1 h-72 bg-black bg-opacity-40">
                    <div class="flex items-center">
                        <div class="header-content-text-area  bg-opacity-60 p-5 ml-2 mr-2 rounded">
                            <h1 class="mb-2 font-bold text-xl" id="header_content_title">{{ __('messages.header content text.title') }}</h1>
                            <p class="md:text-base sm:text-sm lg:text-lg" id="header_content_text">
                                {{ __('messages.header content text.body') }}
                            </p>
                        </div>
                    </div>

                    <div class="flex items-center justify-center">
                        <a href="#" class="seeProductsButton bg-yellow-400 hover:bg-yellow-500 font-bold py-2 px-4 rounded transition duration-300">{{ __('messages.header content text.button')}}</a>
                    </div>
                </div>
            </div>

            <div class="home-bottom-area grid md:grid-cols-2 sm:grid-cols-1">
                <div>
                    <div class="flex justify-center items-center mt-10">
                        <h1 class="text-3xl font-bold text-gray-600">{{ __('messages.top products') }}</h1>
                    </div>
                    <div class="product-card-area grid md:p-20 sm:p-0 lg:grid-cols-2 md:grid-cols-2">
                        @foreach($topProducts as $topProduct)
                            <div class="product_card w-64 bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl hover:scale-105 duration-500 transform transition cursor-pointer mb-6">
                                <img src="{{ asset('images/customer_images/product_images') }}/{{ $topProduct->image }}" alt="lesson.png">
                                <div class="p-5">
                                    <h1 class="text-2xl font-bold">{{ $topProduct->name }}</h1>
                                    <p class="mt-3 text-md font-semibold text-gray-600">{{ __('messages.product card content text.product category') }}: {{ $topProduct->category->name }}</p>
                                    <p class="mt-1 mb-5 text-gray-500 text-sm">
                                        {{ $topProduct->description }}
                                    </p>
                                    <div class="flex justify-center">
                                        <a href="{{ route('customerProductDetails', ['id' => $topProduct->id]) }}" class="product-card-show-button flex items-center p-2 rounded-lg bg-yellow-500 text-yellow-200 hover:bg-yellow-200 hover:text-yellow-500 transition duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 transition duration-300" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                            </svg>
                                            {{ __('messages.product card content text.review product') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="slider-area flex flex-col justify-center md:p-10 sm:p-0">
                    <div class="carousel relative shadow-2xl bg-white rounded-2xl">
                        <div class="carousel-inner relative overflow-hidden w-full rounded-2xl">
                            <!--Slide 1-->
                            <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden="" checked="checked">
                            <div class="carousel-item absolute opacity-0" style="height:50vh;">
                                <div class="block h-full w-full">
                                    <div class="slider-grid-type grid grid-cols-2 h-full">
                                        <div class="flex flex-col justify-center">
                                            <img src="{{ asset('images/customer_images/general_images/topUser.png') }}" alt="user image" class="object-contain w-full h-48">
                                        </div>

                                        <div class="flex flex-col justify-center">
                                            <h1 class="flex justify-center mb-5 font-bold text-xl">{{ __('messages.slide1.top user') }}</h1>

                                            <ul>
                                                <li class="mt-5 text-md"><i class="fas fa-chevron-right mr-2"></i>{{ __('messages.slide1.user name') }}: Tunahan Genç</li>
                                                <li class="mt-5 text-md"><i class="fas fa-chevron-right mr-2"></i>{{ __('messages.slide1.user email') }}: tunahangncc@gmail.com</li>
                                                <li class="mt-5 text-md"><i class="fas fa-chevron-right mr-2"></i>{{ __('messages.slide1.user gender') }}: Male</li>
                                                <li class="mt-5 text-md"><i class="fas fa-chevron-right mr-2"></i>{{ __('messages.slide1.number of products owned by the user') }}: 20</li>
                                                <li class="mt-5">
                                                    <a href="#" class="see-top-user-products-button bg-blue-900 text-white p-2 hover:bg-blue-700 rounded transition duration-300">
                                                        <i class="fas fa-shopping-bag mr-2 transition duration-300"></i>
                                                        {{ __('messages.slide1.see products') }}
                                                    </a>
                                                </li >
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <label for="carousel-3" class="prev control-1 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
                            <label for="carousel-2" class="next control-1 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

                            <!--Slide 2-->
                            <input class="carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true" hidden="">
                            <div class="carousel-item absolute opacity-0" style="height:50vh;">
                                <div class="block h-full w-full">
                                    <div class="block h-full w-full">
                                        <div class="slider-grid-type grid grid-cols-2 h-full">
                                            <div class="flex flex-col justify-center">
                                                <img src="{{ asset('images/customer_images/general_images/slide1.jpg') }}" alt="slide.jpg" class="object-contain w-full h-48">
                                            </div>

                                            <div class="flex flex-col justify-center">
                                                <h1 class="flex justify-center mb-5 font-bold text-xl">{{ __('messages.slide2.easy shopping') }}</h1>

                                                <ul class="slide-ul md:mr-20">
                                                    <li class="mt-5 text-md">
                                                        <i class="fas fa-chevron-right mr-2"></i>
                                                        {{ __('messages.slide2.text1') }}
                                                    </li>
                                                    <li class="mt-5 text-md">
                                                        <i class="fas fa-chevron-right mr-2"></i>
                                                        {{ __('messages.slide2.text2') }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <label for="carousel-1" class="prev control-2 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
                            <label for="carousel-3" class="next control-2 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

                            <!--Slide 3-->
                            <input class="carousel-open" type="radio" id="carousel-3" name="carousel" aria-hidden="true" hidden="">
                            <div class="carousel-item absolute opacity-0" style="height:50vh;">
                                <div class="block h-full w-full">
                                    <div class="block h-full w-full">
                                        <div class="block h-full w-full">
                                            <div class="slider-grid-type grid grid-cols-2 h-full">
                                                <div class="flex flex-col justify-center">
                                                    <img src="{{ asset('images/customer_images/general_images/slide2.jpg') }}" alt="slide.jpg" class="object-contain w-full h-48">
                                                </div>

                                                <div class="flex flex-col justify-center">
                                                    <h1 class="flex justify-center mb-5 font-bold text-xl">{{ __('messages.slide3.show yourself') }}</h1>

                                                    <ul class="slide-ul md:mr-20">
                                                        <li class="mt-5 text-md"><i class="fas fa-chevron-right mr-2"></i>{{ __('messages.slide3.text1') }}</li>
                                                        <li class="mt-5 text-md"><i class="fas fa-chevron-right mr-2"></i>{{ __('messages.slide3.text2') }}</li>
                                                        <li class="flex justify-around mt-5 text-md">
                                                            <a href="#" class="add-new-user-button bg-blue-900 text-white p-2 rounded w-40 z-10 hover:bg-blue-700 transition duration-300">
                                                                <i class="fas fa-plus mr-2"></i>
                                                                {{ __('messages.slide3.sign up') }}
                                                            </a>

                                                            <a href="#" class="user-login-button bg-blue-900 text-white p-2 rounded w-40 z-10 hover:bg-blue-700 transition duration-300">
                                                                <i class="fas fa-sign-in-alt mr-2"></i>
                                                                {{ __('messages.slide3.login') }}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <label for="carousel-2" class="prev control-3 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
                            <label for="carousel-1" class="next control-3 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

                            <!-- Add additional indicators for each slide-->
                            <ol class="carousel-indicators">
                                <li class="inline-block mr-3">
                                    <label for="carousel-1" class="carousel-bullet cursor-pointer block text-4xl text-white hover:text-blue-700">•</label>
                                </li>
                                <li class="inline-block mr-3">
                                    <label for="carousel-2" class="carousel-bullet cursor-pointer block text-4xl text-white hover:text-blue-700">•</label>
                                </li>
                                <li class="inline-block mr-3">
                                    <label for="carousel-3" class="carousel-bullet cursor-pointer block text-4xl text-white hover:text-blue-700">•</label>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('SpecialJs')

@endsection
