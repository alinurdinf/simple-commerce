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
            <div style="padding:150px !important">
                <div class="text-left">
                    <h1 class="h4 font-weight-bold mb-4">{{ __('Hi, Selamat Datang') }}</h1>
                    <p>Silahkan isi field dibawah ini untuk melakukan registrasi</p>
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

                <form method="POST" action="{{ route('register') }}" class="user">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">


                    <div class="form-group">
                        <input type="text" class="form-control " name="name" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>
                    </div>

                    <div class="form-group">
                        <input type="number" class="form-control " name="phone" placeholder="{{ __('Phone Number') }}" value="{{ old('phone') }}" required autofocus>
                    </div>

                    <div class="form-group">
                        <input type="email" class="form-control " name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>

                <hr>

                <div class="text-center">
                    <a class="small" href="{{ route('login') }}">
                        {{ __('Already have an account? Login!') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
