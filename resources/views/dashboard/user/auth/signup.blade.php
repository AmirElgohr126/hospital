@extends('dashboard.layouts.master2')
@section('css')
    <!-- Sidemenu-respoansive-tabs css -->
    <link href="{{ URL::asset('assets/dashboard/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css') }}"
        rel="stylesheet">
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
                                    <div class="mb-5 d-flex"> <a href="#"><img
                                                src="{{ URL::asset('assets/dashboard/img/brand/favicon.png') }}"
                                                class="sign-favicon ht-40" alt="logo"></a>
                                        <h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Va<span>le</span>x</h1>
                                    </div>
                                    <div class="main-signup-header">
                                        <h2 class="text-primary">Get Started</h2>
                                        <h5 class="font-weight-normal mb-4">It's free to signup and only takes a minute.
                                        </h5>
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label>Firstname & Lastname</label>
                                                <input class="form-control @error('name') is-invalid @enderror"
                                                    placeholder="Enter your firstname and lastname" type="text"
                                                    name="name" value="{{ old('name') }}">
                                                @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input class="form-control @error('email') is-invalid @enderror"
                                                    placeholder="Enter your email" type="email" name="email"
                                                    value="{{ old('email') }}">
                                                @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input class="form-control @error('password') is-invalid @enderror"
                                                    placeholder="Enter your password" type="password" name="password">
                                                @error('password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input
                                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                                    placeholder="Enter Confirm password" type="password"
                                                    name="password_confirmation">
                                                @error('password_confirmation')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            
                                            <button class="btn btn-main-primary btn-block" type="submit">Create
                                                Account</button>
                                        </form>
                                        <div class="main-signup-footer mt-5">
                                            <p>Already have an account? <a href="{{ url('/' . ($page = 'signin')) }}">Sign
                                                    In</a>
                                            </p>
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
@section('js')
    <script>
        document.querySelector('form').addEventListener('submit', function (e) {
            let valid = true;
            const name = document.querySelector('input[name="name"]');
            const email = document.querySelector('input[name="email"]');
            const password = document.querySelector('input[name="password"]');
            const passwordConfirmation = document.querySelector('input[name="password_confirmation"]');

            // Clear previous error messages
            document.querySelectorAll('.invalid-feedback').forEach(el => el.remove());
            document.querySelectorAll('.form-control').forEach(el => el.classList.remove('is-invalid'));

            // Name validation
            if (!name.value.trim()) {
                valid = false;
                name.classList.add('is-invalid');
                name.insertAdjacentHTML('afterend', '<div class="invalid-feedback">Name is required.</div>');
            }

            // Email validation
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!email.value || !emailPattern.test(email.value)) {
                valid = false;
                email.classList.add('is-invalid');
                email.insertAdjacentHTML('afterend', '<div class="invalid-feedback">Please enter a valid email.</div>');
            }

            // Password validation
            if (!password.value || password.value.length < 8) {
                valid = false;
                password.classList.add('is-invalid');
                password.insertAdjacentHTML('afterend', '<div class="invalid-feedback">Password must be at least 8 characters.</div>');
            }

            // Password confirmation
            if (password.value !== passwordConfirmation.value) {
                valid = false;
                passwordConfirmation.classList.add('is-invalid');
                passwordConfirmation.insertAdjacentHTML('afterend', '<div class="invalid-feedback">Passwords do not match.</div>');
            }

            if (!valid) {
                e.preventDefault(); // Prevent form submission
            }
        });
    </script>
@endsection
@endsection
