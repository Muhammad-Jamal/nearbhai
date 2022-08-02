@extends('frontend.layouts.layout')
@section('content')
<div style="width:100%;position: relative;background-image: url('{{ asset('frontend/images/banner.jpg') }}" class="py-lg-5 py-6 bg-cover container-fluid">
    <main id="content">
        <section class="py-6">
            <div class="container">
                <div class="row login-register">
                    <div class="col-lg-6"></div>
                    <div class="col-lg-6">
                        <div class="border-0">
                            <div class="card-body  pr-lg-0 pl-xl-13 ">
                                <h2 class="card-title fs-30 font-weight-600 text-dark lh-16 mb-2 text-center">Sign Up</h2>
                                <form class="form" method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-row mx-n2">
                                        <div class="col-sm-12 px-2">
                                            <div class="form-group">
                                                <label for="lastName" class="text-heading"><b>Name</b></label>
                                                <input type="text"
                                                    class="form-control form-control-lg border-1 @error('name') is-invalid @enderror"
                                                    name="name" value="{{ old('name') }}" id="Name" placeholder="Name">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row mx-n2">
                                        <div class="col-sm-12 px-2">
                                            <div class="form-group">
                                                <label for="email" class="text-heading"><b>Email</b></label>
                                                <input type="text"
                                                    class="form-control form-control-lg border-1 @error('email') is-invalid @enderror"
                                                    name="email" value="{{ old('email') }}" id="email"
                                                    placeholder="Your Email">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row mx-n2">
                                        <div class="col-sm-12 px-2">
                                            <div class="form-group">
                                                <label for="password-1" class="text-heading"><b>Password</b></label>
                                                <div class="input-group input-group-lg">
                                                    <input type="password"
                                                        class="form-control border-1 @error('password') is-invalid @enderror"
                                                        name="password" id="password-1"
                                                        placeholder="Password">

                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 px-2">
                                            <div class="form-group">
                                                <label for="re-password" class="text-heading"><b>Confirm Password</b></label>
                                                <div class="input-group input-group-lg">
                                                    <input type="password" class="form-control border-1 " name="password_confirmation"
                                                        id="re-password" placeholder="Confirm Password">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-lg btn-block rounded">Register</button>
                                </form>
                                <p class="text-center" style="margin-top: 10px">Already have an account? <a href="{{ route('login') }}" class="text-heading hover-primary"><u>Log
                                    in</u></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
@endsection
