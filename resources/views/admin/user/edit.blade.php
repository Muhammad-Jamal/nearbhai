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
                        <h2 class="card-title fs-30 font-weight-600 text-dark lh-16 mb-2 text-left">User Edit</h2>
                        <form method="POST" action="{{ route('user.update',$user->id) }}"  enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="name">Name</label>
                                <input type="text"
                                    class="form-control form-control-lg border-0 @error('name') is-invalid @enderror"
                                    name="name" value="{{ $user->name }}" id="name" placeholder="Your name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="email">Email</label>
                                <input type="text"
                                    class="form-control form-control-lg border-0 @error('email') is-invalid @enderror"
                                    name="email" value="{{ $user->email }}" id="email" placeholder="Your email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="image">Profile Image</label>
                                <input type="file"
                                    class="form-control form-control-lg border-0 @error('image') is-invalid @enderror"
                                    name="image" id="image">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="address">Address</label>
                                <input type="text"
                                    class="form-control form-control-lg border-0 @error('address') is-invalid @enderror"
                                    name="address" id="address">
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="password-2">Password</label>
                                <div class="input-group input-group-lg">
                                    <input type="password"
                                        class="form-control border-0 shadow-none fs-13 @error('password') is-invalid @enderror"
                                        name="password" id="password-2" placeholder="Password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg btn-block rounded">Update Profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    @endsection
</div>
