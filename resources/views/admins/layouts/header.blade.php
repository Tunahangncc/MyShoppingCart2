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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{ asset('styles/css/admin/tailwind.css') }}">
    @yield('specialCSS')

    @yield('title')
</head>
<body class="text-blueGray-700 antialiased">

<noscript>You need to enable JavaScript to run this app.</noscript>

<div id="root">
    <nav class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6">
        <div class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto">
            <button class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent" type="button" onclick="toggleNavbar('example-collapse-sidebar')">
                <i class="fas fa-bars"></i>
            </button>

            <a class="md:block text-left md:pb-2 text-blueGray-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0" href="{{ route('adminDashboard') }}">My Shopping Cart</a>

            <div class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded hidden" id="example-collapse-sidebar">
                <div class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-blueGray-200">
                    <div class="flex flex-wrap">
                        <div class="w-6/12">
                            <a class="md:block text-left md:pb-2 text-blueGray-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0" href="{{ route('adminDashboard') }}">
                                My Shopping Cart
                            </a>
                        </div>

                        <div class="w-6/12 flex justify-end">
                            <button type="button" class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent" onclick="toggleNavbar('example-collapse-sidebar')">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Divider -->
                <hr class="my-4 md:min-w-full"/>
                <!-- Heading -->
                <h6 class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
                    Admin Layout Pages
                </h6>
                <!-- Navigation -->
                <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                    <li class="items-center">
                        <a href="{{ route('adminDashboard') }}" class="text-xs uppercase py-3 font-bold block text-pink-500 hover:text-pink-600">
                            <i class="fas fa-tv mr-2 text-sm opacity-75"></i>
                            Dashboard
                        </a>
                    </li>

                    <li class="items-center">
                        <a href="{{ route('adminProfileSettings') }}" class="text-xs uppercase py-3 font-bold block text-blueGray-700 hover:text-blueGray-500">
                            <i class="fas fa-tools mr-2 text-sm text-blueGray-300"></i>
                            Profile Settings
                        </a>
                    </li>

                    <li class="items-center">
                        <a href="{{ route('adminWebsiteUsers') }}" class="text-xs uppercase py-3 font-bold block text-blueGray-700 hover:text-blueGray-500">
                            <i class="fas fa-table mr-2 text-sm text-blueGray-300"></i>
                            Website Users
                        </a>
                    </li>
                </ul>



                <!-- Divider -->
                <hr class="my-4 md:min-w-full"/>
                <!-- Heading -->
                <h6 class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
                    Product And Category Operations Page
                </h6>
                <!-- Navigation -->
                <ul class="md:flex-col md:min-w-full flex flex-col list-none md:mb-4">
                    <li class="items-center">
                        <a href="{{ route('adminProductOperations') }}" class="text-blueGray-700 hover:text-blueGray-500 text-xs uppercase py-3 font-bold block">
                            <i class="fas fa-fingerprint text-blueGray-300 mr-2 text-sm"></i>
                            Product Operation
                        </a>
                    </li>

                    <li class="items-center">
                        <a href="{{ route('adminCategoryOperations') }}" class="text-blueGray-700 hover:text-blueGray-500 text-xs uppercase py-3 font-bold block">
                            <i class="fas fa-clipboard-list text-blueGray-300 mr-2 text-sm"></i>
                            Category Operation
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
