@extends('layouts.auth')
<style>
    .container-fluid {
        height: 100vh;
    }

    .row.justify-content-center {
        height: 100%;
    }

</style>
@section('main-content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
        <div class="col-lg-6">
            <div class="align-items-center" style="padding:150px !important">
                <div class="text-left">
                    <h1 class="h4 font-weight-bold mb-4">{{ __('Selamat Datang Admin') }}</h1>
                    <p>Silahkan masukkan email atau nomor telepon dan password
                        Anda untuk mulai menggunakan aplikasi</p>

                </div>

                @if ($errors->any())
                <div class="alert alert-danger border-left-danger" role="alert">
                    <ul class="pl-4 my-2">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="user">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <input type="email" class="form-control " name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required autofocus>
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control " name="password" placeholder="{{ __('Password') }}" required>
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox small">
                            <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="remember">{{ __('Remember Me') }}</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">
                            {{ __('Login') }}
                        </button>
                    </div>

                </form>

                <hr>

                @if (Route::has('password.request'))
                <div class="text-center">
                    <a class="small" href="{{ route('password.request') }}">
                        {{ __('Forgot Password?') }}
                    </a>
                </div>
                @endif

                @if (Route::has('register'))
                <div class="text-center">
                    <a class="small" href="{{ route('register') }}">{{ __('Create an Account!') }}</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
