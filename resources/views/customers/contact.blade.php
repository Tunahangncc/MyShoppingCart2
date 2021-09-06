@extends('customers.layouts.master')

@section('title')
    <title>{{ __('messages.navbar content text.links.contact') }}</title>
@endsection

@section('SpecialCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/css/customer/contact.css') }}">
@endsection


@section('content')

    <div class="contact-area max-w-2xl bg-white py-10 px-5 m-auto w-full mt-10">
        <div>
            <div class="text-2xl font-bold mb-6 text-center bg-gray-300 p-2 rounded">
                {{ __('messages.contact form text.title') }}
            </div>

            <div class="grid grid-cols-2 gap-4 max-w-xl m-auto">

                <div class="col-span-2 lg:col-span-1">
                    <input type="text" class="border-solid border-gray-400 border-2 p-3 md:text-xl w-full" placeholder="{{ __('messages.contact form text.message title') }}" />
                </div>

                <div class="col-span-2 lg:col-span-1">
                    <select name="messageType" onchange="selectObjectValueChange()" class="message-type-select unSelectMessageType border-solid border-gray-400 border-2 p-3 md:text-xl w-full">
                        <option value="{{ __('messages.contact form text.message type') }}" selected>{{ __('messages.contact form text.message type') }}</option>
                        <option value="warning">{{ __('messages.contact form text.message type value.warning message') }}</option>
                        <option value="error">{{ __('messages.contact form text.message type value.error message') }}</option>
                        <option value="question">{{ __('messages.contact form text.message type value.question message') }}</option>
                    </select>
                </div>

                <div class="col-span-2">
                    <textarea cols="30" rows="8" class="border-solid border-gray-400 border-2 p-3 md:text-xl w-full"
                        placeholder="{{ __('messages.contact form text.message body') }}" style="min-height: 200px; max-height: 300px;"></textarea>
                </div>

                <div class="col-span-2 text-right">
                    <form action="#" method="POST">
                        @csrf

                        <button class="send-message-button rounded-md py-3 px-6 bg-green-500 text-white font-bold w-full sm:w-64 hover:bg-green-700 transition duration-300">
                            <i class="send-message-button-icon fas fa-paper-plane transition duration-300"></i> {{ __('messages.contact form text.send message') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('SpecialJs')
    <script src="{{ asset('styles/js/customer/contact.js') }}"></script>
@endsection
