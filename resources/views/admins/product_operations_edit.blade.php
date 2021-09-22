@extends('admins.layouts.master')

@section('specialCSS')
    <link rel="stylesheet" href="{{ asset('styles/css/admin/product_operations_edit.css') }}">
@endsection

@section('title')
    <title>Product Operation | Edit Product</title>
@endsection

@section('content')
    <div class="relative md:ml-64 bg-blueGray-50">
        <nav
            class="absolute top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-nowrap md:justify-start flex items-center p-4">
            <div class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4">
                <a class="text-white text-sm uppercase hidden lg:inline-block font-semibold"
                   href="{{ route('adminDashboard') }}">{{ __('messages.product operations edit page text.dashboard') }}</a>

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
                                    {{ __('messages.product operations edit page text.edit product') }}
                                </h6>

                                <a href="{{ route('adminReturnProductOperations') }}"
                                   class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150">
                                    <i class="fas fa-chevron-circle-left mr-2"></i>{{ __('messages.product operations edit page text.go back') }}
                                </a>
                            </div>
                        </div>
                        <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                            <form action="{{ route('adminProductOperationsEditPut', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf @method('PUT')

                                <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">{{ __('messages.product operations edit page text.product information') }}</h6>

                                <div class="flex flex-wrap">
                                    <div class="w-full lg:w-6/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                                                {{ __('messages.product operations edit page text.product name') }}
                                            </label>

                                            <input  type="text"
                                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                    placeholder="Product Name"
                                                    name="name"
                                                    value="{{ $product->name }}"/>
                                        </div>
                                    </div>

                                    <div class="w-full lg:w-3/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                                                {{ __('messages.product operations edit page text.product price') }}
                                            </label>

                                            <input  type="number" min="1"
                                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                    name="price"
                                                    value="{{ $product->price }}"/>
                                        </div>
                                    </div>

                                    <div class="w-full lg:w-3/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                                                {{ __('messages.product operations edit page text.product amount') }}
                                            </label>

                                            <input  type="number" min="1"
                                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                    name="amount"
                                                    value="{{ $product->amount }}"/>
                                        </div>
                                    </div>

                                    <div class="w-full lg:w-6/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                                                {{ __('messages.product operations edit page text.product brand') }}
                                            </label>

                                            <select name="brand"
                                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                <option value="{{ $product->brand->id }}" selected>{{ $product->brand->name }}</option>
                                                @foreach($brands as $brand)
                                                    @if($brand->id != $product->brand->id)
                                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="w-full lg:w-6/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                                                {{ __('messages.product operations edit page text.product category') }}
                                            </label>

                                            <select name="category"
                                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                <option value="{{ $product->category->id }}" selected>{{ $product->category->name }}</option>
                                                @foreach($categories as $category)
                                                    @if($category->id != $product->category->id)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <hr class="mt-6 border-b-1 border-blueGray-300" />

                                <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">{{ __('messages.product operations edit page text.color information') }}</h6>

                                <div class="flex flex-wrap">
                                    <div class="w-full lg:w-6/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                                                {{ __('messages.product operations edit page text.product color - hex color') }}
                                            </label>
                                            <input  type="color" style="min-height: 44px;"
                                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                    name="hexCode"
                                                    value="{{ $product->color->hex_code }}"/>
                                        </div>
                                    </div>

                                    <div class="w-full lg:w-6/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                                                {{ __('messages.product operations edit page text.product color - name') }}
                                            </label>
                                            <input  type="text"
                                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                    placeholder="Color Name"
                                                    name="colorName"
                                                    value="{{ $product->color->name }}"/>
                                        </div>
                                    </div>
                                </div>

                                <hr class="mt-6 border-b-1 border-blueGray-300" />

                                <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">{{ __('messages.product operations edit page text.product description') }}</h6>

                                <div class="flex flex-wrap">
                                    <div class="w-full lg:w-8/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                                                {{ __('messages.product operations edit page text.product description') }}
                                            </label>

                                            <textarea  type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" name="description" style="max-height: 200px; min-width: 100%; max-width: 100%; min-height: 100px" placeholder="Product Description">{{ $product->description }}</textarea>
                                        </div>
                                    </div>

                                    <div class="w-full lg:w-4/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                                                {{ __('messages.product operations edit page text.product image') }}
                                            </label>

                                            <div class="flex items-center">
                                                <input type="file" name="image" id="product-image" style="display: none;" onchange="readURL(this)">
                                                <label for="product-image"
                                                       class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 cursor-pointer">
                                                    {{ __('messages.product operations edit page text.choose image') }}
                                                </label>
                                                <img src="{{ asset('images/customer_images/product_images/'.$product->image) }}" alt="product imaeg" id="image" width="130" height="130">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                                        type="submit">
                                    <i class="fas fa-edit mr-2"></i>{{ __('messages.product operations edit page text.edit product') }}
                                </button>
                            </form>

                            <div class="message-area">
                                @if(session('success-message'))
                                    <span>{{ __('messages.product operations edit page text.'.session('success-message')) }}</span>
                                @endif
                            </div>
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
