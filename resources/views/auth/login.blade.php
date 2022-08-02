@extends('frontend.layouts.layout')
@section('content')
<div style="width:100%;position: relative;background-image: url('{{ asset('frontend/images/banner.jpg') }}" class="py-lg-5 py-6 bg-cover container-fluid">
    <main id="content">
        <section class="py-13">
            <div class="container">
                <div class="row login-register">
                    <div class="col-lg-6"></div>
                    <div class="col-lg-6">
                        <div class="border-0">
                            <div class="card-body px-6 pr-lg-0 pl-xl-13 py-6">
                                <h2 class="card-title fs-30 font-weight-600 text-dark lh-16 mb-2 text-center">Login</h2>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group mb-4">
                                        <label for="email" class="text-heading"><b>Email</b></label>
                                        <input type="text"
                                            class="form-control form-control-lg border-1 @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" id="email" placeholder="Your email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="password-2" class="text-heading"><b>Password</b></label>
                                        <div class="input-group input-group-lg">
                                            <input type="password"
                                                class="form-control border-1 @error('password') is-invalid @enderror"
                                                name="password" id="password-2" placeholder="Password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary btn-block rounded">Log in</button>
                                        </div>
                                    </div>
                                </form>
                                <p class="text-center" style="margin-top: 10px">Don’t have an account yet? <a href="{{ route('register') }}" class="text-heading hover-primary"><u>Register</u></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
@endsection
