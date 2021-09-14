@extends('customers.layouts.master')

@section('title')
    <title>{{ __('messages.invisible links.profile message box') }}</title>
@endsection

@section('SpecialCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/css/customer/profile.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/css/customer/profile_message_box.css') }}">
@endsection


@section('content')

    <?php
    $i = 0;
    $fullName = Auth::user()->name;
    $nameArray = explode(' ', $fullName);
    ?>

    <div class="profile-content-area flex justify-around">
        <div class="profile-categories mt-6">
            @include('customers.widgets.profile_category')
        </div>

        <div class="profile-message-box-area flex justify-center items-center">
            <div class="grid-products-table-area grid grid-cols-1 mb-3">
                <div class="default-table">
                    <table class="table-fixed border-collapse">
                        <thead>
                        <tr>
                            <th class="w-96 border border-gray-800">{{ __('messages.profile message box text.message name') }}</th>
                            <th class="w-96 border border-gray-800">{{ __('messages.profile message box text.message body') }}</th>
                            <th class="w-96 border border-gray-800">{{ __('messages.profile message box text.message type') }}</th>
                            <th class="w-52 border border-gray-800">{{ __('messages.profile message box text.realised time') }}</th>
                            <th class="w-52 border border-gray-800">{{ __('messages.profile message box text.delete message') }}</th>
                        </tr>
                        </thead>

                        <tbody>
                        @if(isset($myMessages))
                            @foreach($myMessages as $myMessage)
                                <tr>
                                    <td class="border border-gray-800" align="center">{{ $myMessage->name }}</td>
                                    <td class="border border-gray-800" align="center">{{ $myMessage->body }}</td>
                                    <td class="border border-gray-800" align="center">{{ $myMessage->type }}</td>
                                    <td class="border border-gray-800" align="center">{{ $myMessage->created_at->diffForHumans() }}</td>
                                    <td class="border border-gray-800" align="center">
                                        <form action="{{ route('customerProfileMessageBoxMessageDelete', ['id' => $myMessage->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="bg-red-500 text-white transition duration-300 hover:bg-red-700 p-2 rounded-md"><i class="fas fa-minus-circle"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>

                <div class="mobile-table hidden">
                    @if(isset($myMessages))
                        @foreach($myMessages as $myMessage)
                            <table class="table-fixed border-collapse">
                                <tr>
                                    <td class="table-row-head w-96 border border-gray-800">{{ __('messages.profile message box text.message name') }}</td>
                                    <td class="w-96 border border-gray-800">{{ $myMessage->name }}</td>
                                </tr>

                                <tr>
                                    <td class="table-row-head w-96 border border-gray-800">{{ __('messages.profile message box text.message body') }}</td>
                                    <td class="w-96 border border-gray-800">{{ $myMessage->body }}</td>
                                </tr>

                                <tr>
                                    <td class="table-row-head w-96 border border-gray-800">{{ __('messages.profile message box text.message type') }}</td>
                                    <td class="w-96 border border-gray-800">{{ $myMessage->type }}</td>
                                </tr>

                                <tr>
                                    <td class="table-row-head w-96 border border-gray-800">{{ __('messages.profile message box text.realised time') }}</td>
                                    <td class="w-96 border border-gray-800">{{ $myMessage->created_at->diffForHumans() }}</td>
                                </tr>

                                <tr>
                                    <td class="table-row-head w-96 border border-gray-800">{{ __('messages.profile message box text.delete message') }}</td>
                                    <td class="w-96 border border-gray-800" align="center">
                                        <form action="{{ route('customerProfileMessageBoxMessageDelete', ['id' => $myMessage->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="bg-red-500 text-white transition duration-300 hover:bg-red-700 p-2 rounded-md">
                                                <i class="fas fa-minus-circle"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            </table>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection

@section('SpecialJs')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
@endsection
