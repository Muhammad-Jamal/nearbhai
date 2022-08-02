@extends('frontend.layouts.master')
@section('content')
<div class="page-content">
        @include('frontend.partials.header')
    @section('content')
        <main id="content" class="bg-gray-01" style="width: 100%">
            <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 invoice-listing" data-animated-id="1">
                @include('frontend.common.flash-message')
                <div class="card border-0 p-3">
                    <div class="card-body px-6 pr-lg-0 pl-xl-13 py-6">
                        <h2 class="card-title fs-30 font-weight-600 text-dark lh-16 mb-2 text-left">User Create</h2>
                        <form class="form" method="POST" action="{{ route('user.store') }}">
                                    @csrf
                                    <div class="form-row mx-n2">
                                        <div class="col-sm-12 px-2">
                                            <div class="form-group">
                                                <label for="lastName" class="text-heading">Name</label>
                                                <input type="text"
                                                    class="form-control form-control-lg border-0 @error('name') is-invalid @enderror"
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
                                                <label for="email" class="text-heading">Email</label>
                                                <input type="text"
                                                    class="form-control form-control-lg border-0 @error('email') is-invalid @enderror"
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
                                        <div class="col-sm-6 px-2">
                                            <div class="form-group">
                                                <label for="password-1" class="text-heading">Password</label>
                                                <div class="input-group input-group-lg">
                                                    <input type="password"
                                                        class="form-control border-0 shadow-none @error('password') is-invalid @enderror"
                                                        name="password" id="password-1"
                                                        placeholder="Password">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text bg-gray-01 border-0 text-body fs-18">
                                                        </span>
                                                    </div>
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 px-2">
                                            <div class="form-group">
                                                <label for="re-password">Re-Enter Password</label>
                                                <div class="input-group input-group-lg">
                                                    <input type="password" class="form-control border-0 shadow-none" name="password_confirmation"
                                                        id="re-password" placeholder="Password">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text bg-gray-01 border-0 text-body fs-18">
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-lg btn-block rounded">Create</button>
                                </form>
                    </div>
                </div>
            </div>
        </main>
    @endsection
</div>
