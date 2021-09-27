@extends('customers.layouts.master')

@section('title')
    <title>{{ __('messages.navbar content text.links.about') }}</title>
@endsection

@section('SpecialCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/css/customer/about_us.css') }}">
@endsection


@section('content')

    <div class="grid grid-cols-1">
        <div class="about-content">
            <div class="pt-6 pb-12 bg-gray-300 rounded-md shadow-md">
                <div id="card" class="">
                    <h2 class="text-center font-serif  uppercase text-4xl xl:text-5xl">{{ __('messages.about content.who are we') }}</h2>

                    <div class="container w-100 lg:w-4/5 mx-auto flex flex-col">

                        <div class="flex flex-col md:flex-row overflow-hidden bg-white rounded-lg shadow-xl  mt-4 w-100 mx-2">

                            <div class="h-64 w-auto md:w-1/2">
                                <img class="inset-0 h-full w-full object-cover object-center" src="{{ asset('images/customer_images/general_images/about1.png') }}">
                            </div>

                            <div class="w-full py-4 px-6 text-gray-800 flex flex-col justify-between">
                                <h3 class="font-semibold text-lg leading-tight truncate">{{ __('messages.about content.about the website') }}</h3>
                                <p class="mt-2">
                            <span>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci amet animi consequuntur eius eos facere fuga id illo ipsum iusto laudantium officiis, praesentium quod rem repellat reprehenderit, vitae. Id, veritatis.
                            </span>
                                    <span>
                                Fuga laboriosam nam quasi quisquam repellendus repudiandae, saepe velit? Animi consequuntur ea modi, non quod tempore? Aliquid, commodi debitis eaque ex iure libero maiores modi praesentium quasi, rerum ut vero.
                            </span>
                                </p>
                                <p class="text-sm text-gray-700 uppercase tracking-wide font-semibold mt-2">
                                    Tunahan Genç &bull; 50 minute ago
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="short-information items-center">
            <div class="flex justify-center">
                <div class="show-world-store-description p-20 w-full md:w-1/2">
                    <div class="image-area">
                        <img src="{{ asset('images/customer_images/general_images/about2.gif') }}" alt="" class="world-image rounded-t-lg transition duration-300">
                    </div>
                    <div class="bg-white rounded-lg shadow-lg">
                        <div class="p-2 mb-1 cursor-pointer">
                            <h2 class="flex justify-center items-center font-bold mb-2 text-2xl text-purple-800">{{ __('messages.short information.world store') }}</h2>
                        </div>

                        <div class="hidden-description flex justify-center p-5">
                            {{ __('messages.short information.text1') }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('SpecialJs')
    <script src="{{ asset('styles/js/customer/about_us.js') }}"></script>
@endsection
