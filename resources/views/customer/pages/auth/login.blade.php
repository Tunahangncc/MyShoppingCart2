@extends('customer.layouts.master')

@section('title', 'Login - '.env('APP_NAME'))

@section('main')
    <div class="login-form">
        <form id="form-login-form">
            <div class="form-icon">
                <span><i class="fa fa-user"></i></span>
            </div>

            <div class="form-group">
                <input type="text" class="form-control item" id="username" name="username" placeholder="Username">
            </div>

            <div class="form-group">
                <input type="password" class="form-control item" id="password" name="password" placeholder="Password">
            </div>

            <div class="form-group">
                <button type="button" class="btn btn-block btn-form-login">LOGIN</button>
            </div>
        </form>

        <div class="any-options">
            <a href="{{ route('customer.register') }}" class="text-muted">Do you not have an account ?</a>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(function () {
            $('.btn-form-login').click(function () {
                let form = $('#form-login-form');

                login(form.serializeArray());
            });
        });

        function login(data) {
            clearInputsError();

            $.ajax({
                type: 'POST',
                url: '{{ route('customer.login') }}',
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
