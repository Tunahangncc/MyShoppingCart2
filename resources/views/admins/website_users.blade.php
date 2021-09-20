@extends('admins.layouts.master')

@section('specialCSS')
    <link rel="stylesheet" href="{{ asset('styles/css/admin/website_users.css') }}">
@endsection

@section('title')
    <title>Website Users</title>
@endsection

@section('content')
    <div class="relative md:ml-64 bg-blueGray-50">
        <nav
            class="absolute top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-nowrap md:justify-start flex items-center p-4">
            <div class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4">
                <a class="text-white text-sm uppercase hidden lg:inline-block font-semibold"
                   href="{{ route('adminDashboard') }}">{{ __('messages.website users page text.dashboard') }}</a>

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
            <div class="flex flex-wrap mt-4">
                <div class="w-full mb-12 px-4">
                    <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">
                        <div class="rounded-t mb-0 px-4 py-3 border-0">
                            <div class="flex flex-wrap items-center">
                                <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                                    <h3 class="font-semibold text-lg text-blueGray-700">{{ __('messages.website users page text.admins table') }}</h3>
                                </div>
                            </div>
                        </div>

                        <div class="admins-table-area block w-full overflow-x-auto">
                            <!-- Admins table -->
                            <table class="admins-table items-center w-full bg-transparent border-collapse">
                                <thead>
                                <tr>
                                    <th
                                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                        {{ __('messages.website users page text.admin name') }}
                                    </th>
                                    <th
                                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                        {{ __('messages.website users page text.admin email') }}
                                    </th>
                                    <th
                                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                        {{ __('messages.website users page text.status') }}
                                    </th>
                                    <th
                                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                        {{ __('messages.website users page text.admin image') }}
                                    </th>
                                    <th
                                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                        {{ __('messages.website users page text.show details') }}
                                    </th>
                                    <th
                                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($admins as $admin)
                                    <tr>
                                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            <span class="ml-3 font-bold text-blueGray-600">{{ $admin->name }}</span>
                                        </td>
                                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            {{ $admin->email }}
                                        </td>
                                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            <i class="fas fa-circle text-orange-500 mr-2"></i>
                                            {{ $admin->adminInformation->type }}
                                        </td>
                                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            <div class="flex">
                                                <img src="{{ asset('images/admin_images/profile_images/'.$admin->images) }}" alt="admin image" class="w-10 h-10 rounded-full border-2 border-blueGray-50 shadow"/>
                                            </div>
                                        </td>
                                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            <div class="flex items-center">
                                                <a href="{{ route('adminAdminProfilePage', ['id' => $admin->id]) }}" class="bg-indigo-500 text-white px-2 py-1 rounded font-bold"><i class="fas fa-eye mr-2"></i>{{ __('messages.website users page text.show details') }}</a>
                                            </div>
                                        </td>
                                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-right">
                                            <a href="{{ route('adminDeleteAdmin', ['id' => $admin->id]) }}">
                                                {{ __('messages.website users page text.delete admin') }}
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    {{ $users->links() }}
                                </tr>
                                </tbody>
                            </table>

                            <div class="message-area">
                                @if(session('success-message'))
                                    <span>{{ __('messages.website users page text.'.session('success-message')) }}</span>
                                @elseif(session('error-message'))
                                    <span>{{ __('messages.website users page text.'.session('error-message')) }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full mb-12 px-4">
                    <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-pink-900 text-white">
                        <div class="rounded-t mb-0 px-4 py-3 border-0">
                            <div class="flex flex-wrap items-center">
                                <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                                    <h3 class="font-semibold text-lg text-white">
                                        {{ __('messages.website users page text.users table') }}
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="users-table-area block w-full overflow-x-auto">
                            <!-- users table -->
                            <table class="users-table items-center w-full bg-transparent border-collapse">
                                <thead>
                                <tr>
                                    <th
                                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-pink-800 text-pink-300 border-pink-700">
                                        {{ __('messages.website users page text.user name') }}
                                    </th>
                                    <th
                                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-pink-800 text-pink-300 border-pink-700">
                                        {{ __('messages.website users page text.user email') }}
                                    </th>
                                    <th
                                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-pink-800 text-pink-300 border-pink-700">
                                        {{ __('messages.website users page text.user status') }}
                                    </th>
                                    <th
                                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-pink-800 text-pink-300 border-pink-700">
                                        {{ __('messages.website users page text.gender') }}
                                    </th>
                                    <th
                                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-pink-800 text-pink-300 border-pink-700">
                                        {{ __('messages.website users page text.show details') }}
                                    </th>
                                    <th
                                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-pink-800 text-pink-300 border-pink-700">
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    @if($user->status != 'ban')
                                        <tr>
                                            <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left flex items-center">
                                                <img src="{{ asset('images/customer_images/profile_images/'.$user->images) }}" class="h-12 w-12 bg-white rounded-full border" alt="user image"/>
                                                <span class="ml-3 font-bold text-white">{{ $user->name }}</span>
                                            </th>
                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                {{ $user->email }}
                                            </td>
                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                <i class="fas fa-circle text-orange-500 mr-2"></i>
                                                {{ $user->status }}
                                            </td>
                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                <div class="flex">
                                                    <span class="font-bold text-white">{{ __('messages.website users page text.'.$user->gender) }}</span>
                                                </div>
                                            </td>
                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                <div class="flex items-center">
                                                    <a href="{{ route('adminCustomerProfilePage', ['id' => $user->id]) }}" class="bg-indigo-500 text-white px-2 py-1 rounded font-bold"><i class="fas fa-eye mr-2"></i>{{ __('messages.website users page text.show details') }}</a>
                                                </div>
                                            </td>
                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-right">
                                                <a class="delete-website-user" href="{{ route('adminDeleteUser', ['id' => $user->id]) }}">
                                                    {{ __('messages.website users page text.ban user') }}
                                                </a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                            <div class="message-area">
                                @if(session('delete-user-success-message'))
                                    <span>{{ __('messages.website users page text.'.session('delete-user-success-message')) }}</span>
                                @elseif(session('delete-user-error-message'))
                                    <span>{{ __('messages.website users page text.'.session('delete-user-error-message')) }}</span>
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
