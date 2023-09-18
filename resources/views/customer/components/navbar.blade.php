<!-- Start Header/Navigation -->
<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="MSC navbar" id="customer-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('customer.home') }}">MyShoppingCart<span>.</span></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMSC"
                aria-controls="navbarMSC" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMSC">
            <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item active" id="page-home"><a class="nav-link" href="{{ route('customer.home') }}">Home</a></li>

                <li class="nav-item" id="page-products"><a href="{{ route('customer.products.list') }}" class="nav-link">Products</a></li>
            </ul>

            <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                @isset($user)
                    <li><a class="nav-link" href="#"><i class="fa fa-user"></i></a></li>

                    <li><a class="nav-link" href="#"><i class="fa fa-shopping-bag"></i></a></li>
                @else
                    <li><a href="#" class="btn-login">Login</a></li>
                @endisset
            </ul>
        </div>
    </div>
</nav>
<!-- End Header/Navigation -->
