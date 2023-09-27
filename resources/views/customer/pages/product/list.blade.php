@extends('customer.layouts.master')

@section('title', 'Products - '.env('APP_NAME'))

@section('css')
    <style>
        /* Product Card CSS */
        .product-card .btn-product-detail {
            padding: 0 10px;
            width: 100%;
            border-radius: 4px;
        }

        .product-card .image img {
            width: 150px;
        }

        .product-card .main-heading {
            font-size: 40px;
            color: red !important;
        }

        .product-card .ratings {
            color: orange;
        }

        .product-card .colors {
            display: flex;
            margin-top: 2px;
        }

        .product-card .colors label {
            width: 15px;
            height: 15px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            margin-right: 6px;
        }

        /* Parent Category CSS */
        .parent-category-buttons ul {
            display: flex;
            list-style: none;
            margin: 0;
        }

        .parent-category-buttons ul li a {
            padding: 0 10px;
            border-radius: 4px;
        }

        @media (max-width: 425px) {
            .parent-category-buttons {
                margin-top: 20px;
            }
        }

        @media (max-width: 375px) {
            .parent-category-buttons {
                display: block !important;
            }

            .parent-category-buttons h6 {
                text-align: center;
            }

            .parent-category-buttons ul {
                justify-content: space-around;
                padding: 0;
                margin-top: 5px;
            }
        }
    </style>
@endsection

@section('main')
    <div class="product-list m-3">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <input type="text" class="form-control search-products-input" placeholder="Search...">
            </div>

            <div class="col-md-6 col-sm-12 d-flex align-items-center parent-category-buttons">
                <h6 class="m-0">Main Categories :</h6>

                <ul>
                    <li class="me-3">
                        <a href="#" class="btn btn-primary">Man</a>
                    </li>

                    <li class="me-3">
                        <a href="#" class="btn btn-primary">Woman</a>
                    </li>

                    <li>
                        <a href="#" class="btn btn-primary">Kids</a>
                    </li>
                </ul>
            </div>
        </div><!-- /.row -->

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="row product-list">
                    @foreach($products as $product)
                        <div class="col-md-4 col-sm-12" data-product_id="{{ $product->id }}">
                            <div class="card p-3 mb-4 product-card">
                                <div class="d-flex justify-content-between align-items-center ">
                                    <div class="mt-2">
                                        <h4 class="text-uppercase">{{ $product->title }}</h4>

                                        <div class="mt-5">
                                            <h5 class="text-uppercase mb-0">{{ $product->subtitle }}</h5>
                                            <h1 class="main-heading mt-0">VASE</h1>
                                            <div class="d-flex align-items-center">
                                                <div class="ratings me-2">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>

                                                <div>
                                                    <h6 class="text-muted m-0">4/5</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="image">
                                        <img
                                            src="{{ asset('storage/product_images/'.(! empty($product->cloudFile->toArray()) ? $product->cloudFile[0]->img_name : 'no_image_icon.png')) }}"
                                            class="img-fluid product-thumbnail" alt="Product Image">
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mt-2 mb-2">
                                    <span>Available colors</span>
                                    <div class="colors">
                                        @if(count($product->colors))
                                            <div class="colors">
                                                @foreach($product->colors as $color)
                                                    <label class="product-colors" data-color_name="{{ $color->name }}"
                                                           data-hex_code="{{ $color->hex_code }}"></label>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>

                                </div>


                                <p>A great option weather you are at office or at home.</p>

                                <a href="{{ route('customer.products.detail', ['product' => $product->id]) }}" class="btn btn-primary btn-product-detail">Detail</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div><!-- /.row -->

        <div class="row">
            <div class="col-md-12 d-flex align-items-center justify-content-center">
                {{ $products->links() }}
            </div>
        </div><!-- /.row -->
    </div>
@endsection

@section('js')
    <script>
        let loadedProducts = $('div[data-product_id]');

        $(function () {
            $.each($('.colors'), function (index, item) {
                $.each($(item).find('label'), function (index2, label) {
                    $(label).css('background-color', $(label).data('hex_code'));
                });
            });

            // Live Search Products - Not Working
            $('.search-products-input').keyup(function () {
                return false;

                let val = $(this).val();

                if (val.length < 3) {
                    return false;
                }

                $.ajax({
                    type: 'GET',
                    url: '{{ route('customer.json.search_product') }}',
                    dataType: 'JSON',
                    data: {title: val},
                    // headers: {
                    //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    // },
                    success: function (response) {
                        let products = response.data.products;
                        let cloneProducts = [];

                        if (products.length <= 0) {
                            return false;
                        }

                        $('.product-list div[data-product_id]').remove();

                        $.each(products, function (index, product) {
                            cloneProducts[index] = $('div[data-product_id="'+product.id+'"]').clone();
                        });

                        $.each(cloneProducts, function (index, product) {
                            $('.product-list').append(product);
                        });
                    },
                    error: function (err) {
                        console.log(err)
                    }
                });
            });
        });
    </script>
@endsection
