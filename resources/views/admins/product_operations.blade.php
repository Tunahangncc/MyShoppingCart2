@extends('admins.layouts.master')

@section('specialCSS')
    <link rel="stylesheet" href="{{ asset('styles/css/admin/product_operations.css') }}">
@endsection

@section('title')
    <title>Product Operation</title>
@endsection

@section('content')
    <div class="relative md:ml-64 bg-blueGray-50">
        <nav
            class="absolute top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-nowrap md:justify-start flex items-center p-4">
            <div class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4">
                <a class="text-white text-sm uppercase hidden lg:inline-block font-semibold"
                   href="{{ route('adminDashboard') }}">{{ __('messages.product operations page text.dashboard') }}</a>

                <ul class="flex-col md:flex-row list-none items-center hidden md:flex">
                    <a class="text-blueGray-500 block" href="#pablo" onclick="openDropdown(event,'user-dropdown')">
                        <div class="items-center flex">
                                <span
                                    class="w-12 h-12 text-sm text-white bg-blueGray-200 inline-flex items-center justify-center rounded-full">
                                    <img alt="admin image"
                                         class="w-full rounded-full align-middle border-none shadow-lg"
                                         src="{{ asset('images/admin_images/profile_images/'.Auth::user()->images) }}"/>
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

        <div class="px-4 md:px-10 mx-auto w-full -m-24">
            <div class="flex flex-wrap">
                <div class="w-full lg:w-5/12 px-4">
                    <div
                        class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                        <div class="rounded-t bg-white mb-0 px-6 py-6">
                            <div class="text-center flex justify-between">
                                <h6 class="text-blueGray-700 text-xl font-bold">
                                    {{ __('messages.product operations page text.create product') }}
                                </h6>
                            </div>
                        </div>
                        <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                            <form method="POST" action="{{ route('adminProductOperationsCreateProduct') }}" enctype="multipart/form-data">
                                @csrf

                                <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">{{ __('messages.product operations page text.product information') }}</h6>

                                <div class="flex flex-wrap">
                                    <div class="w-full lg:w-6/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                                                {{ __('messages.product operations page text.product name') }}
                                            </label>

                                            <input  type="text"
                                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                    placeholder="Product Name"
                                                    name="name"/>
                                        </div>
                                    </div>

                                    <div class="w-full lg:w-3/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                                                {{ __('messages.product operations page text.product price') }}
                                            </label>

                                            <input  type="number" min="1"
                                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                    value="1"
                                                    name="price"/>
                                        </div>
                                    </div>

                                    <div class="w-full lg:w-3/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                                                {{ __('messages.product operations page text.product amount') }}
                                            </label>

                                            <input  type="number" min="1"
                                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                    value="1"
                                                    name="amount"/>
                                        </div>
                                    </div>

                                    <div class="w-full lg:w-6/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                                                {{ __('messages.product operations page text.product brand') }}
                                            </label>

                                            <select name="brand" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                @foreach($brands as $brand)
                                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="w-full lg:w-6/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                                                {{ __('messages.product operations page text.product category') }}
                                            </label>

                                            <select name="category"
                                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <hr class="mt-6 border-b-1 border-blueGray-300" />

                                <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">{{ __('messages.product operations page text.color information') }}</h6>

                                <div class="flex flex-wrap">
                                    <div class="w-full lg:w-6/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                                                {{ __('messages.product operations page text.product color - hex color') }}
                                            </label>
                                            <input  type="color" style="min-height: 44px;"
                                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                    value="#00000"
                                                    name="hexCode"/>
                                        </div>
                                    </div>

                                    <div class="w-full lg:w-6/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                                                {{ __('messages.product operations page text.product color - name') }}
                                            </label>
                                            <input  type="text"
                                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                    placeholder="Color Name"
                                                    name="colorName"/>
                                        </div>
                                    </div>
                                </div>

                                <hr class="mt-6 border-b-1 border-blueGray-300" />

                                <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">{{ __('messages.product operations page text.product description') }}</h6>

                                <div class="flex flex-wrap">
                                    <div class="w-full lg:w-8/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                                                {{ __('messages.product operations page text.product description') }}
                                            </label>

                                            <textarea  type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" name="description" style="max-height: 200px; min-width: 100%; max-width: 100%; min-height: 100px" placeholder="Product Description"></textarea>
                                        </div>
                                    </div>

                                    <div class="w-full lg:w-4/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                                                {{ __('messages.product operations page text.product image') }}
                                            </label>

                                            <div class="flex items-center">
                                                <input type="file" name="image" id="product-image" style="display: none;" onchange="readURL(this)">
                                                <label for="product-image"
                                                       class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 cursor-pointer">
                                                    {{ __('messages.product operations page text.choose image') }}
                                                </label>
                                                <img src="https://www.freeiconspng.com/thumbs/no-image-icon/no-image-icon-15.png" alt="product image" id="image" width="130" height="130">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button
                                    class="create-product-button bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                                    type="submit">
                                    <i class="first-icon fas fa-plus mr-2"></i><i class="second-icon fas fa-plus-circle mr-2"></i>{{ __('messages.product operations page text.create product') }}
                                </button>
                            </form>

                            <div class="message-area">
                                @if(session('success-message'))
                                    <span>{{ __('messages.product operations page text.'.session('success-message')) }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-5/12 px-4">
                    <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-pink-900 text-white">
                        <div class="rounded-t mb-0 px-4 py-3 border-0">
                            <div class="flex flex-wrap items-center">
                                <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                                    <h3 class="font-semibold text-lg text-white">
                                        {{ __('messages.product operations page text.products table') }}
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="products-table-area block w-full overflow-x-auto">
                            <!-- Projects table -->
                            <table class="products-table items-center w-full bg-transparent border-collapse">
                                <thead>
                                <tr>
                                    <th
                                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-pink-800 text-pink-300 border-pink-700">
                                        {{ __('messages.product operations page text.product name') }}
                                    </th>
                                    <th
                                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-pink-800 text-pink-300 border-pink-700">
                                        {{ __('messages.product operations page text.product brand') }}
                                    </th>
                                    <th
                                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-pink-800 text-pink-300 border-pink-700">
                                        {{ __('messages.product operations page text.product category') }}
                                    </th>
                                    <th
                                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-pink-800 text-pink-300 border-pink-700">
                                        {{ __('messages.product operations page text.product price') }}
                                    </th>
                                    <th
                                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-pink-800 text-pink-300 border-pink-700">
                                        {{ __('messages.product operations page text.product image') }}
                                    </th>
                                    <th
                                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-pink-800 text-pink-300 border-pink-700">
                                        {{ __('messages.product operations page text.edit product') }}
                                    </th>
                                    <th
                                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-pink-800 text-pink-300 border-pink-700">
                                        {{ __('messages.product operations page text.delete product') }}
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td
                                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            {{ $product->name }}
                                        </td>
                                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            {{ $product->brand->name }}
                                        </td>
                                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            {{ $product->category->name }}
                                        </td>
                                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            ₺{{ $product->price }}
                                        </td>
                                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            <img src="{{ asset('images/customer_images/product_images/'.$product->image) }}"
                                                 class="h-12 w-12 bg-white rounded-full border"
                                                 alt="product image"/>
                                        </td>
                                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            <div class="flex items-center">
                                                <a href="{{ route('adminProductOperationsEdit', ['id' => $product->id]) }}" class="bg-indigo-500 text-white px-2 py-1 rounded font-bold"><i class="fas fa-edit"></i></a>
                                            </div>
                                        </td>
                                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            <div class="flex items-center">
                                                <form action="{{ route('adminProductOperationsDeleteProduct', ['id' => $product->id]) }}" method="POST">
                                                    @csrf @method('DELETE')

                                                    <button type="submit" class="bg-indigo-500 text-white px-2 py-1 rounded font-bold">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

                            <div class="message-area">
                                @if(session('delete-success-message'))
                                    <span>{{ __('messages.product operations page text.'.session('delete-success-message')) }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="table-paginate-link">
                            {{ $products->links()}}
                        </div>
                    </div>
                </div>
            </div>

            @include('admins.widgets.footer')
        </div>
    </div>
@endsection

@section('specialJS')
    <script src="{{ asset('styles/js/admin/product_operations.js') }}"></script>
@endsection
