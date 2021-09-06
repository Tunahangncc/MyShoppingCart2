@extends('customers.layouts.master')

@section('title')
    <title>{{ __('messages.navbar content text.links.products') }}</title>
@endsection

@section('SpecialCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/css/customer/products.css') }}">
@endsection


@section('content')

<div class="flex flex-col">
    <div class="categories-area pb-5">
        <div class="header flex bg-gray-800 z-20">
            <div class="bars"><i class="fas fa-list-ul"></i></div>

            <ul id="navbar">
                <li class="drop-one">
                    <a href="#">Categories <span><i class="fas fa-chevron-down"></i></span></a>

                    <div class="menu-one">
                        <ul>
                            <li><h4>Our Company</h4></li>
                            <li><img src="{{ asset('images/customer_images/general_images/header.png') }}" alt=""></li>
                        </ul>

                        <ul>
                            <li><h4>Design</h4></li>
                            <li><a href="#">HTML</a></li>
                            <li><a href="#">CSS</a></li>
                            <li><a href="#">Javascript</a></li>
                            <li><a href="#">Python</a></li>
                        </ul>

                        <ul>
                            <li><h4>Development </h4></li>
                            <li><a href="#">Website</a></li>
                            <li><a href="#">Frontend</a></li>
                            <li><a href="#">List Item</a></li>
                            <li><a href="#">List Item</a></li>
                        </ul>

                        <ul>
                            <li><h4>Skill </h4></li>
                            <li><a href="#">List Item</a></li>
                            <li><a href="#">List Item</a></li>
                            <li><a href="#">List Item</a></li>
                            <li><a href="#">List Item</a></li>
                        </ul>

                        <ul>
                            <li><h4>News </h4></li>
                            <li><a href="#">List Item</a></li>
                            <li><a href="#">List Item</a></li>
                            <li><a href="#">List Item</a></li>
                            <li><a href="#">List Item</a></li>
                        </ul>
                    </div>
                </li>
                <!--
                <li class="drop-two">
                    <a href="#">Social <span><i class="fas fa-chevron-down"></i></span></a>

                    <ul class="menu-two">
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Youtube</a></li>
                        <li><a href="#">Linkedin</a></li>
                        <li><a href="#">Instagram</a></li>
                    </ul>
                </li>
                -->
            </ul>
        </div>
    </div>

    <div class="products-area md:p-10">
        <div class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1">
            <div class="product-card container mx-auto max-w-sm w-80 mb-6 bg-white rounded-xl shadow-lg hover:scale-105 hover:shadow-2xl transform transition-all duration-500">
                <div class="flex items-center justify-between px-4">
                    <div class="flex justify-between items-center py-4">
                        <img class="w-12 rounded-full" src="https://d2qp0siotla746.cloudfront.net/img/use-cases/profile-picture/template_0.jpg" alt="Alex" />

                        <div class="ml-3">
                            <h1 class="text-xl font-bold text-gray-800 cursor-pointer">Product Owner</h1>
                            <p class="text-sm text-gray-800 hover:underline cursor-pointer">#release time</p>
                        </div>
                    </div>

                    <div>
                        <i class="product-card-top-right-circle fas fa-circle-notch transition duration-300"></i>
                    </div>
                </div>

                <img src="https://images.unsplash.com/photo-1527112862739-c3b9466d902e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=966&q=80" alt="">

                <div class="p-6">
                    <h1 class="text-3xl font-bold text-gray-800">Product Name</h1>

                    <h2 class="text-xl text-gray-800 font-semibold">{{ __('messages.card text.product description') }}</h2>

                    <p class="text-lg font font-thin mb-5">Lorem ipsum carrots, enhanced undergraduate developer, but they do occaecat time and vitality, Lorem ipsum carrots,</p>

                    <a href="{{ route('customerProductDetails') }}" class="show-product-details-button bg-gradient-to-r from-blue-400 to-blue-700 p-2 text-white rounded transition duration-300">
                        <i class="fas fa-search"></i>
                        {{ __('messages.card text.show details') }}
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

@section('SpecialJs')
    <script src="{{ asset('styles/js/customer/category.js') }}"></script>
@endsection
