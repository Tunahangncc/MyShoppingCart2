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

    <title>Customer Profile</title>
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
                                <img alt="user image" src="{{ asset('images/customer_images/profile_images') }}/{{ $customer->images }}" class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px"/>
                            </div>
                        </div>

                        <div class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center"></div>

                        <div class="w-full lg:w-4/12 px-4 lg:order-1">
                            <div class="flex justify-center py-4 lg:pt-4 pt-8">
                                <div class="mr-4 p-3 text-center">
                                    <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">{{ $customer->shoppingHistory->total_expenditure }}</span>

                                    <span class="text-sm text-blueGray-400">{{ __('messages.customer profile page text.total expenditure') }}</span>
                                </div>

                                <div class="mr-4 p-3 text-center">
                                    <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">{{ getMyProductCount($customer->id)->productCount }}</span>

                                    <span class="text-sm text-blueGray-400">{{ __('messages.customer profile page text.total product') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-12">
                        <h3 class="text-4xl font-semibold leading-normal mb-2 text-blueGray-700 mb-2">{{ $customer->name }}</h3>

                        <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
                            <i class="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400"></i>
                            {{ $customer->address->district }}, {{ $customer->address->neighbourhood }}
                        </div>

                        <div class="mb-2 text-blueGray-600 mt-10">
                            <i class="fas fa-venus-mars mr-2 text-lg text-blueGray-400"></i>
                            {{ __('messages.customer profile page text.'.$customer->gender) }}
                        </div>

                        <div class="mb-2 text-blueGray-600">
                            <i class="fas fa-at mr-2 text-lg text-blueGray-400"></i>
                            {{ $customer->email }}
                        </div>

                        <div class="mb-2 text-blueGray-600">
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
