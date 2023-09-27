
@include('customer.components.footer')

<!-- JS -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/jquery-mask.min.js') }}"></script>
<script src="{{ asset('js/customer/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/customer/tiny-slider.js') }}"></script>
<script src="{{ asset('js/customer/custom.js') }}"></script>
<script src="https://kit.fontawesome.com/2fbfa6be68.js" crossorigin="anonymous"></script>
<script src="{{ asset('js/active-page.js') }}"></script>
<script src="{{ asset('js/notify.min.js') }}"></script>
<script src="{{ asset('js/global.js') }}"></script>
<script>
    @if(\Illuminate\Support\Facades\Session::has('alert-message'))
        $.notify('{{ \Illuminate\Support\Facades\Session::get('alert-message') }}', '{{ \Illuminate\Support\Facades\Session::get('alert-type') }}');
        {{ \Illuminate\Support\Facades\Session::forget('alert-message') }};
    @endif
</script>
@yield('js')
</body>
</html>
