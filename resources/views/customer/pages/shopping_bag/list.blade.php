@extends('customer.layouts.master')

@section('title', 'Shopping Bag - '.env('APP_NAME'))

@section('main')
    <div class="shopping-bag-section m-5">
        <div class="card">
            <div class="row">
                <div class="col-md-8 cart">
                    <div class="summary-title">
                        <div class="row">
                            <div class="col"><h4><b>Shopping Cart</b></h4></div>
                        </div>
                    </div>

                    @foreach($products as $product)
                        <div class="row border-top border-bottom">
                            <div class="row main align-items-center">
                                <div class="col-2">
                                    <img class="img-fluid"
                                         src="{{ asset('storage/product_images/'.(! empty($product->productDetail->cloudFile->toArray()) ? $product->productDetail->cloudFile[0]->img_name : 'no_image_icon.png')) }}"
                                         alt="{{ $product->productDetail->title }}">
                                </div>

                                <div class="col">
                                    <div class="row text-muted">{{ $product->productDetail->title }}</div>
                                    <div class="row">{{ $product->productDetail->subtitle }}</div>
                                </div>

                                <div class="col">
                                    <a href="#" class="btn-decrease-amount">-</a>
                                    <a href="#" class="border product-amount">{{ $product->amount }}</a>
                                    <a href="#" class="btn-increase-amount">+</a>
                                </div>

                                <div class="col">
                                    {{ $product->productDetail->price }} ₺ <a href="#"><span class="close"><i class="fa fa-trash"></i></span></a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="back-to-shop">
                        <a href="#">
                            <i class="fa fa-arrow-left"></i> <span class="text-muted">Back to shop</span>
                        </a>
                    </div>
                </div><!-- /.col-md-8 -->

                <div class="col-md-4 summary">
                    <div>
                        <h5><b>Summary</b></h5>
                    </div>

                    <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                        <div class="col">TOTAL PRICE</div>
                        <div class="col text-right">&euro; 137.00</div>
                    </div>
                    <button class="btn">CHECKOUT</button>
                </div><!-- /.col-md-4 -->
            </div>

        </div>
    </div>
@endsection

@section('js')
    <script>
        $(function () {
            $('.btn-increase-amount').click(function () {
                let amountInput = $(this).closest('.col').find('.product-amount');

                let amount = parseInt(amountInput.text()) + 1;

                amountInput.html(amount);
            });

            $('.btn-decrease-amount').click(function () {
                let amountInput = $(this).closest('.col').find('.product-amount');

                let amount = parseInt(amountInput.text()) - 1;

                if (amount <= 0) {
                    amount = 0;
                }

                amountInput.html(amount);
            });
        });
    </script>
@endsection
