@extends('customer.layouts.master')

@section('title', 'Products - '.env('APP_NAME'))

@section('css')
    <style>
        #form-filter-product input,
        #form-filter-product select {
            height: 40px;
            border-radius: 4px;
        }

        .btn-filter-product {
            border-radius: 4px;
            padding: 0;
            height: 40px;
            width: 100%;
        }

        #form-filter-product #min_price,
        #form-filter-product #max_price {
            width: 45%;
        }
    </style>
@endsection

@section('main')
    @component('customer.components.product_area', ['products' => $products, 'users' => $users])@endcomponent
@endsection

@section('js')
    <script>
        $(function () {
            @if(request()->filled('created_by'))
            $('#form-filter-product select').val('{{ request()->input('created_by') }}');
            @endif
        });
    </script>
@endsection
