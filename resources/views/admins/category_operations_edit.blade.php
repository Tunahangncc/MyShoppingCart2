@extends('admins.layouts.master')

@section('specialCSS')
    <link rel="stylesheet" href="{{ asset('styles/css/admin/category_operation_edit.css') }}">
@endsection

@section('title')
    <title>Category Operation | Edit</title>
@endsection

@section('content')
    <div class="relative md:ml-64 bg-blueGray-50">
        <nav
            class="absolute top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-nowrap md:justify-start flex items-center p-4">
            <div class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4">
                <a class="text-white text-sm uppercase hidden lg:inline-block font-semibold"
                   href="{{ route('adminDashboard') }}">{{ __('messages.category operations edit page text.dashboard') }}</a>

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
                                    {{ __('messages.category operations edit page text.edit category') }}
                                </h6>

                                <a href="{{ route('adminReturnCategoryOperations') }}"
                                   class="go-back bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150">
                                    <i class="fas fa-chevron-circle-left mr-2"></i>{{ __('messages.category operations edit page text.go back') }}
                                </a>
                            </div>
                        </div>
                        <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                            <form action="{{ route('adminCategoryOperationsEditPut', ['id' => $category->id]) }}" method="POST">
                                @csrf @method('PUT')

                                <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">{{ __('messages.category operations edit page text.category information') }}</h6>

                                <div class="flex flex-wrap">
                                    <div class="w-full lg:w-12/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                                                {{ __('messages.category operations edit page text.category name') }}
                                            </label>

                                            <input  type="text"
                                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                    placeholder="Category Name"
                                                    name="name"
                                                    value="{{ $category->name }}"/>
                                        </div>
                                    </div>

                                    <div class="w-full lg:w-12/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                                                {{ __('messages.category operations edit page text.select parent category') }}
                                            </label>

                                            <select name="parentCategory"
                                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                <option value="{{ $category->parent_id}}" selected>{{ $category->parentCategory->name}}</option>
                                                @foreach($categories as $categoryItem)
                                                    @if($categoryItem->id != $category->parentCategory->id && $categoryItem->name != $category->name)
                                                        <option value="{{ $categoryItem->id }}">{{ $categoryItem->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <button
                                    class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                                    type="submit">
                                    <i class="fas fa-edit mr-2"></i>{{ __('messages.category operations edit page text.edit category') }}
                                </button>
                            </form>

                            <div class="message-area">
                                @if(session('success-message'))
                                    <span>{{ __('messages.category operations edit page text.'.session('success-message')) }}</span>
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
