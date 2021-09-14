@extends('customers.layouts.master')

@section('title')
    <title>{{ __('messages.navbar content text.links.contact') }}</title>
@endsection

@section('SpecialCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/css/customer/contact.css') }}">
@endsection


@section('content')

    <div class="min-h-screen bg-no-repeat bg-cover bg-center">
        <div class="flex justify-end">
            <div class="bg-white min-h-screen w-full flex justify-center items-center">
                <div class="shadow p-10 rounded bg-gray-200">
                    <form action="{{ route('customerSendMessagePost') }}" method="POST">
                        @csrf

                        <div>
                            <h1 class="text-2xl font-bold">{{ __('messages.contact form text.title') }}</h1>
                        </div>

                        <div class="mt-5">
                            <label class="block text-md mb-2" for="message_name">{{ __('messages.contact form text.message title') }}</label>
                            <input class="px-4 w-full border-2 py-2 rounded-md text-sm outline-none" type="text" name="messageName" placeholder="{{ __('messages.contact form text.message title') }}" id="message_name">
                        </div>

                        <div class="my-3">
                            <label class="block text-md mb-2" for="message_type">{{ __('messages.contact form text.message type') }}</label>
                            <select name="messageType" id="message_type" class="w-full px-4 w-full border-2 py-2 rounded-md text-sm outline-none">
                                <option value="{{ __('messages.contact form text.message type value.error message') }}" selected>{{ __('messages.contact form text.message type value.error message') }}</option>
                                <option value="{{ __('messages.contact form text.message type value.warning message') }}">{{ __('messages.contact form text.message type value.warning message') }}</option>
                                <option value="{{ __('messages.contact form text.message type value.question message') }}">{{ __('messages.contact form text.message type value.question message') }}</option>
                            </select>
                        </div>

                        <div class="my-3">
                            <label class="block text-md mb-2" for="message_body">{{ __('messages.contact form text.message body') }}</label>
                            <textarea name="messageBody" id="message_body" class="w-full" style="min-height: 100px; max-height: 300px; min-width: 100%" placeholder="{{ __('messages.contact form text.message body') }}"></textarea>
                        </div>

                        <div class="">
                            <button class="mt-4 mb-3 w-full bg-green-500 hover:bg-green-400 text-white py-2 rounded-md transition duration-100" type="submit">
                                <i class="fas fa-paper-plane mr-2 transition duration-300"></i>{{ __('messages.contact form text.send message') }}
                            </button>
                        </div>

                        <div>
                            @if(session('success-message'))
                                <span class="bg-green-700 text-white rounded p-2">{{ __('messages.contact form text.success1') }}</span>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('SpecialJs')
    <script src="{{ asset('styles/js/customer/contact.js') }}"></script>
@endsection
