<!-- Start Product Section -->
<div class="product-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 text-center">
                <h2 class="section-title">All Products</h2>
            </div>
        </div><!-- /.row -->

        <div class="row mb-5">
            <hr>
        </div><!-- /.row -->

        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="row mb-2">
                    <div class="col-md-12 col-sm-12">
                        <i class="fa-solid fa-filter me-2"></i>Filter Products
                    </div>
                </div><!-- /.row -->

                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('customer.products.list') }}" id="form-filter-product" method="GET">
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <div class="form-group">
                                        <input type="text" name="title" id="title" class="form-control" placeholder="Title" value="{{ request()->input('title') }}">
                                    </div>
                                </div>

                                <div class="col-md-12 mb-2">
                                    <div class="form-group">
                                        <input type="text" name="subtitle" id="subtitle" class="form-control" placeholder="Subtitle" value="{{ request()->input('subtitle') }}">
                                    </div>
                                </div>

                                <div class="col-md-12 mb-2">
                                    <div class="form-group d-flex justify-content-between">
                                        <input type="number" name="min_price" id="min_price" class="form-control" placeholder="Min. Price" value="{{ request()->input('min_price') }}">
                                        <input type="number" name="max_price" id="max_price" class="form-control" placeholder="Max. Price" value="{{ request()->input('max_price') }}">
                                    </div>
                                </div>

                                <div class="col-md-12 mb-2">
                                    <div class="form-group">
                                        <select name="created_by" id="created_by" class="form-control">
                                            <option value="" selected>Select..</option>

                                            @isset($users)
                                                @foreach($users as $id => $name)
                                                    <option value="{{ $id }}">{{ $name }}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-filter-product">Filter</button>
                                </div>
                            </div><!-- /.row -->
                        </form>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.col -->

            <div class="col-md-8 col-sm-12">
                <div class="row">
                    @if(isset($products))
                        @foreach($products as $product)
                            <div class="col-md-6 col-sm-12 mb-4">
                                <a class="product-item" href="{{ route('customer.products.detail', ['product' => $product->id]) }}">
                                    <img
                                        src="{{ asset('storage/product_images/'.(! empty($product->cloudFile->toArray()) ? $product->cloudFile[0]->img_name : 'no_image_icon.png')) }}"
                                        class="img-fluid product-thumbnail" alt="Product Image">

                                    <h3 class="product-title">{{ $product->title }}</h3>

                                    <strong class="product-price me-1">{{ $product->price }}</strong><span class="text-sm text-muted">TL</span>

                                    <span class="icon-cross">
                                <img src="{{ asset('storage/cross.svg') }}" class="img-fluid" alt="cross">
                            </span>
                                </a>
                            </div><!-- /.col-lg-3 col-md-4 col-sm-6 -->
                        @endforeach
                    @endif
                </div><!-- /.row -->
            </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="row product-page-links">
            <div class="col-md-12 col-sm-12">
                @if(isset($products))
                    {{ $products->links() }}
                @else
                    <a href="{{ route('cutomer.home') }}" class="btn btn-primary">No Results, Return Home</a>
                @endif
            </div>
        </div><!-- /.row -->
    </div>
</div>
<!-- End Product Section -->
