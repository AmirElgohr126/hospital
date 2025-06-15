@extends('dashboard.layouts.master2')
@section('css')
    <link href="{{ URL::asset('assets/dashboard/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css') }}"
        rel="stylesheet">
        <style>
            .loginform{
                display: none;
            }
        </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
                <div class="row wd-100p mx-auto text-center">
                    <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                        <img src="{{ URL::asset('assets/dashboard/img/media/login.png') }}"
                            class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                    </div>
                </div>
            </div>
            <!-- The content half -->
            <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
                <div class="login d-flex align-items-center py-2">
                    <!-- Demo content-->
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                <div class="card-sigin">
                                    <div class="mb-5 d-flex"> <a href="{{ url('/' . ($page = 'index')) }}"><img
                                                src="{{ URL::asset('assets/dashboard/img/brand/favicon.png') }}"
                                                class="sign-favicon ht-40" alt="logo"></a>
                                        <h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">
                                            <span>{{ __('auth.dashboard') }}</span>
                                        </h1>
                                    </div>
                                    <div class="card-sigin">
                                        <div class="main-signup-header">
                                            <h2>{{ __('auth.login') }}</h2>
                                            <h5 class="font-weight-semibold mb-4">{{ __('auth.please_sign_in') }}</h5>

                                            @if($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            {{-- select admin or user --}}
                                            <div class="form-group">
                                                <select class="form-control" aria-label="Default select example" name='user_type'>
                                                    <option selected disabled>
                                                        {{ __('auth.select_user_type') }}
                                                    </option>
                                                    <option value="admin">{{ __('auth.admin') }}</option>
                                                    <option value="user">{{ __('auth.user') }}</option>
                                                </select>
                                            </div>
{{-- --------------------------------------------------------------------------------------------------------------------- --}}
                                            <div class="loginform" id="user">
                                                <h5 class="font-weight-semibold mb-4">
                                                    {{ __('auth.login') }}
                                                </h5>
                                                <form action="{{ route('login') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="user_type" value="user">
                                                    <div class="form-group">
                                                        <label>
                                                            {{ __('auth.email') }}
                                                        </label>
                                                        <input class="form-control @error('email') is-invalid @enderror"
                                                            placeholder="{{ __('auth.email') }}" type="email" name="email"
                                                            value="{{ old('email') }}">
                                                        @error('email')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label>{{ __('auth.password') }}</label>
                                                        <input class="form-control @error('password') is-invalid @enderror"
                                                            placeholder="{{ __('auth.password') }}" type="password" name="password">
                                                        @error('password')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <button class="btn btn-main-primary btn-block" type="submit">
                                                        {{ __('auth.login') }}
                                                    </button>
                                                    <div class="row row-xs">
                                                        <div class="col-sm-6">
                                                            <button class="btn btn-block"><i class="fab fa-facebook-f"></i>
                                                                Signup with Facebook</button>
                                                        </div>
                                                        <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                                            <button class="btn btn-info btn-block"><i
                                                                    class="fab fa-twitter"></i> Signup with Twitter</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
{{-- --------------------------------------------------------------------------------------------------------------------- --}}
                                            <div class="loginform" id="admin" >
                                                <h5 class="font-weight-semibold mb-4">
                                                    {{ __('auth.admin_login') }}
                                                </h5>
                                                <form action="{{ route('login') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="user_type" value="admin">
                                                    <div class="form-group">
                                                        <label>{{ __('auth.email') }}</label>
                                                        <input class="form-control @error('email') is-invalid @enderror"
                                                            placeholder="{{ __('auth.email') }}" type="email" name="email"
                                                            value="{{ old('email') }}">
                                                        @error('email')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label>{{ __('auth.password') }}</label>
                                                        <input class="form-control @error('password') is-invalid @enderror"
                                                            placeholder="{{ __('auth.password') }}" type="text" name="password">
                                                        @error('password')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <button class="btn btn-main-primary btn-block" type="submit">{{ __('auth.login') }}</button>
                                                    <div class="row row-xs">
                                                        <div class="col-sm-6">
                                                            <button class="btn btn-block"><i class="fab fa-facebook-f"></i>
                                                                {{ __('auth.signup_facebook') }}</button>
                                                        </div>
                                                        <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                                            <button class="btn btn-info btn-block"><i
                                                                    class="fab fa-twitter"></i> {{ __('auth.signup_twitter') }}</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="main-signin-footer mt-5">
                                                <p><a href="">{{ __('auth.forgot_password') }}</a></p>
                                                <p>{{ __('auth.dont_have_account') }} <a href="{{ url('/' . ($page = 'register')) }}">{{ __('auth.register') }}</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End -->
                </div>
            </div><!-- End -->
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('select[name="user_type"]').change(function() {
                var userType = $(this).val();
                $('.loginform').hide();
                $('#' + userType).show();
            });
        });
    </script>
@endsection
