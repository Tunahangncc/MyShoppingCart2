@extends('customer.layouts.master')

@section('title', 'Product Detail - '.env('APP_NAME'))

@section('css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&family=Roboto:wght@500;700;900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&family=Roboto+Condensed:wght@300;400;700&display=swap');
    </style>
@endsection

@section('main')
    <div class="product-details p-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3" data-product_id="{{ $product->id }}">
                    <a href="#" class="btn-add-favorite"><i class="fa-regular fa-heart"></i></a>

                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('storage/product_images/'.(! empty($product->cloudFile->toArray()) ? $product->cloudFile[0]->img_name : 'no_image_icon.png')) }}"
                                class="img-fluid product-thumbnail" alt="Product Image">
                        </div>

                        <div class="col-md-8 p-5">
                            <div class="product-title">
                                <h4>{{ $product->title }}</h4>
                            </div>

                            <div class="rates">
                                <div class="stars">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>

                                <div class="point">
                                    <span class="text-muted">4,5</span>
                                </div>
                            </div>

                            <div class="product-description">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque corporis debitis incidunt itaque labore magni nostrum odit officiis praesentium quae, quam quis rem repudiandae sit soluta ullam ut vel vero!
                                </p>
                            </div>

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

                            <form id="form-add-product-to-cart" class="d-flex justify-content-between">
                                <input type="number" class="form-control" name="amount" id="amount" value="1" min="1" max="10">
                                <button type="button" class="btn-add-cart">ADD CART</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.row -->

        <!-- Comment Area -->
        <div class="row mt-3">
            <div class="col-md-12">
                <h4>Comments</h4>

                <div class="comments-area p-3">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="#" id="form-create-comment">
                                <div class="form-group">
                                    <input type="text" name="title" id="title" class="form-control" placeholder="Comment Title...">
                                </div>

                                <div class="form-group">
                                    <textarea name="comment" id="comment" placeholder="Comment Message..." rows="5" class="form-control"></textarea>
                                </div>

                                <div class="form-group">
                                    <div class="ratings me-2">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="button" class="btn-add-comment">ADD COMMENT</button>
                                </div>
                            </form>
                        </div>
                    </div><!-- /.row -->

                    <div class="row mt-5">
                        <div class="col-md-6 col-sm-12">
                            <div class="card p-2">
                                <div class="row">
                                    <div class="col-md-6 d-flex align-items-center">
                                        <img src="{{ asset('storage/avatar/avatar1.jpeg') }}" alt="avatar image" class="comment-avatar-img me-2">
                                        <span class="comment-created-by">Test User</span>
                                    </div>

                                    <div class="col-md-6 text-end">
                                        <span class="comment-created-time">1 Year Ago</span>
                                    </div>
                                </div><!-- /.row -->

                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <h6 class="comment-title">Lorem ipsum dolor</h6>

                                        <p class="comment-text">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, accusamus architecto consequatur cum doloremque eius error explicabo illo incidunt ipsam libero minus numquam, possimus quia, quibusdam reprehenderit ut. Facilis, vero.
                                        </p>
                                    </div>
                                </div><!-- /.row -->

                                <div class="row">
                                    <div class="col-md-12 d-flex justify-content-between">
                                        <div class="comment-stars">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>

                                        <div class="comment-like-buttons">
                                            <button type="button" class="btn-like-comment"><i class="fa-regular fa-thumbs-up"></i></button>
                                            <button type="button" class="btn-unlike-comment"><i class="fa-regular fa-thumbs-up"></i></button>
                                        </div>
                                    </div>
                                </div><!-- /.row -->
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="card p-2">
                                <div class="row">
                                    <div class="col-md-6 d-flex align-items-center">
                                        <img src="{{ asset('storage/avatar/avatar1.jpeg') }}" alt="avatar image" class="comment-avatar-img me-2">
                                        <span class="comment-created-by">Test User</span>
                                    </div>

                                    <div class="col-md-6 text-end">
                                        <span class="comment-created-time">1 Year Ago</span>
                                    </div>
                                </div><!-- /.row -->

                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <h6 class="comment-title">Lorem ipsum dolor</h6>

                                        <p class="comment-text">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, accusamus architecto consequatur cum doloremque eius error explicabo illo incidunt ipsam libero minus numquam, possimus quia, quibusdam reprehenderit ut. Facilis, vero.
                                        </p>
                                    </div>
                                </div><!-- /.row -->

                                <div class="row">
                                    <div class="col-md-12 d-flex justify-content-between">
                                        <div class="comment-stars">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>

                                        <div class="comment-like-buttons">
                                            <button type="button" class="btn-like-comment"><i class="fa-regular fa-thumbs-up"></i></button>
                                            <button type="button" class="btn-unlike-comment"><i class="fa-regular fa-thumbs-up"></i></button>
                                        </div>
                                    </div>
                                </div><!-- /.row -->
                            </div>
                        </div>
                    </div><!-- /.row -->
                </div>
            </div>
        </div><!-- /.row -->
    </div>
@endsection

@section('js')
    <script>
        $(function () {
            // Set Colors
            $.each($('.colors'), function (index, item) {
                $.each($(item).find('label'), function (index2, label) {
                    $(label).css('background-color', $(label).data('hex_code'));
                });
            });

            $('.btn-add-cart').click(function () {
                let $productID = $(this).closest('.card').data('product_id');
                let $amount = $(this).closest('form').find('input').val();

                addCart($productID, $amount);
            });
        });

        function addCart($productID, $amount) {
            $.ajax({
                type: 'POST',
                url: '{{ route('customer.cart.add') }}',
                data: {
                    'product_id': $productID,
                    'amount': $amount
                },
                dataType: 'JSON',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if (response.status) {
                        window.location.reload();
                    }
                },
                error: function (error) {
                    let errors = error.responseJSON.errors ?? [];

                    handleAjaxError(errors)
                }
            });
        }
    </script>
@endsection
