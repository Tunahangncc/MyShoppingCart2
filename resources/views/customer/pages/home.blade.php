@extends('customer.layouts.master')

@section('title', 'Home - '.env('APP_NAME'))

@section('css')
    <style>
        .post-entry {
            box-shadow: rgba(99, 99, 99, 0.2) 0 2px 8px 0;
            padding: 10px;
        }

        .blog-section .post-entry .post-content-entry {
            padding: 0 10px;
        }

        .blog-section .post-entry .post-thumbnail {
            margin-bottom: 10px;
        }

        .btn-show-campaign {
            border-radius: 4px;
            padding: 0 10px;
        }
    </style>
@endsection

@section('hero')
    @include('customer.components.hero')
@endsection

@section('main')
    @include('customer.components.campaigns')
@endsection
