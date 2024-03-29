<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="theme-color" content="#000000"/>

    <link rel="shortcut icon" href="{{ asset('images/admin_images/general_images/favicon.ico') }}"/>
    <link
        rel="apple-touch-icon"
        sizes="76x76"
        href="{{ asset('styles/css/admin/images/apple-icon.png') }}"
    />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"
    />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{ asset('styles/css/admin/tailwind.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/css/admin/customer_profile.css') }}">

    <title>Product Details</title>

    <style type="text/css">
        @media (max-width: 768px) {
            .short-description{
                margin-top: 60px;
            }
        }
    </style>
</head>
<body class="text-blueGray-700 antialiased">

<main class="profile-page">
    <section class="relative block h-500-px">
        <div class="absolute top-0 w-full h-full bg-center bg-cover" style="background-image: url('https://images.unsplash.com/photo-1499336315816-097655dcfbda?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=2710&amp;q=80');">
            <span id="blackOverlay" class="w-full h-full absolute opacity-50 bg-black"></span>
        </div>

        <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden h-70-px" style="transform: translateZ(0px)">
            <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                <polygon class="text-blueGray-200 fill-current" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </section>

    <section class="relative py-16 bg-blueGray-200">
        <div class="container mx-auto px-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64">
                <div class="px-6">
                    <div class="flex flex-wrap justify-center">
                        <div class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center">
                            <div class="relative">
                                <img alt="user image" src="{{ asset('images/customer_images/product_images/'.$product->image) }}" class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px"/>
                            </div>
                        </div>

                        <div class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center"></div>

                        <div class="short-description w-full lg:w-4/12 px-4 lg:order-1">
                            <div class="flex justify-center py-4 lg:pt-4 pt-8">
                                <div class="mr-4 p-3 text-center">
                                    <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">{{ $product->number_of_likes }}</span>

                                    <span class="text-sm text-blueGray-400">{{ __('messages.product details page text.number of likes') }}</span>
                                </div>

                                <div class="mr-4 p-3 text-center">
                                    <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">{{ $product->amount }}</span>

                                    <span class="text-sm text-blueGray-400">{{ __('messages.product details page text.amount') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-12">
                        <h3 class="text-4xl font-semibold leading-normal mb-2 text-blueGray-700 mb-2">{{ $product->name }}</h3>

                        <div class="mb-1 text-blueGray-600 mt-3">
                            <i class="fas fa-ticket-alt mr-2 text-lg text-blueGray-400"></i>
                            <span class="font-bold">{{ __('messages.product details page text.brand') }}</span> : {{ $product->brand->name }}
                        </div>

                        <div class="mb-1 text-blueGray-600 mt-3">
                            <i class="fas fa-tag mr-2 text-lg text-blueGray-400"></i>
                            <span class="font-bold">{{ __('messages.product details page text.price') }}</span> : ₺{{ $product->price }}
                        </div>

                        <div class="mb-1 text-blueGray-600 mt-3">
                            <i class="fas fa-user mr-2 text-lg text-blueGray-400"></i>
                            <span class="font-bold">{{ __('messages.product details page text.owner') }}</span> : {{ $product->user->name }}
                        </div>

                        <div class="mb-1 text-blueGray-600 mt-3">
                            <i class="fas fa-tint mr-2 text-lg text-blueGray-400" style="color: {{ $product->color->hex_code }}"></i>
                            <span class="font-bold">{{ __('messages.product details page text.color') }}</span> : <span style="color: {{ $product->color->hex_code }}">{{ $product->color->name }}</span>
                        </div>

                        <div class="mb-1 text-blueGray-600 mt-3">
                            <i class="fas fa-stream mr-2 text-lg text-blueGray-400"></i>
                            <span class="font-bold">{{ __('messages.product details page text.category') }}</span> : {{ $product->category->name }}
                        </div>

                        <div class="mb-1 text-blueGray-600 mt-3">
                            <i class="fas fa-signature mr-2 text-lg text-blueGray-400"></i>
                            <span class="font-bold">{{ __('messages.product details page text.uniq code') }}</span> : {{ $product->uniq_code }}
                        </div>

                        <div class="mb-1 text-blueGray-600 mt-3">
                            <i class="fas fa-audio-description mr-2 text-lg text-blueGray-400"></i>
                            <span class="font-bold">{{ __('messages.product details page text.description') }}</span> : {{ $product->description }}
                        </div>


                        <div class="mb-3 mt-4 text-blueGray-600">
                            <a href="{{ route('adminDashboard') }}" class="px-3 py-1 rounded text-white transition duration-300">
                                <i class="fas fa-chevron-circle-left mr-2"></i>
                                {{ __('messages.customer profile page text.go back') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

</body>
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
</html>
