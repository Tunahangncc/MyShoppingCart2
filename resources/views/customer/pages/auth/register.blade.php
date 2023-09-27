@extends('customer.layouts.master')

@section('title', 'Register - '.env('APP_NAME'))

@section('main')
    <div class="registration-form">
        <form id="form-registration-form">
            <div class="form-icon">
                <span><i class="fa fa-user"></i></span>
            </div>

            <div class="form-group">
                <input type="text" class="form-control item" id="name" name="name" placeholder="Name">
            </div>

            <div class="form-group">
                <input type="text" class="form-control item" id="username" name="username" placeholder="Username">
            </div>

            <div class="form-group">
                <input type="email" class="form-control item" id="email" name="email" placeholder="Email">
            </div>

            <div class="form-group">
                <input type="text" class="form-control item" id="phone" name="phone" placeholder="Phone">
            </div>

            <div class="form-group">
                <input type="password" class="form-control item" id="password" name="password" placeholder="Password">
            </div>

            <div class="form-group">
                <input type="password" class="form-control item" id="password_confirmation" name="password_confirmation"
                       placeholder="Password Confirm">
            </div>

            <div class="form-group">
                <button type="button" class="btn btn-block btn-register">REGISTER</button>
            </div>
        </form>

        <div class="any-options">
            <a href="{{ route('customer.login') }}" class="text-muted">Do you have an account ?</a>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(function () {
            // Mask Inputs
            $('#phone').mask('0000-000-00-00', {placeholder: "Phone Example => 0xxx-xx-xx"});

            // Register
            $('.btn-register').click(function () {
                let form = $('#form-registration-form');

                register(form.serializeArray());
            });
        });

        function register(data) {
            clearInputsError();

            $.ajax({
                type: 'POST',
                url: '{{ route('customer.register') }}',
                data: data,
                dataType: 'JSON',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if (response.status) {
                        window.location = '{{ route('customer.home') }}';
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
