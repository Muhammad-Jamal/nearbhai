@extends('frontend.layouts.master')
@section('content')
    <div class="page-content">
        @include('frontend.partials.header')
        <main id="content" class="bg-gray-01">
            <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-3 my-profile" data-animated-id="1">
                <h1 class="text-center mainHeading">Welcome  Admin To Business Card Website</h1>
            </div>
            <div class="container pt-5">
                <div class="row mt-5">
                    <div class="col-md-3">
                        <div class="card bg-info">
                            <div class="card-body text-center text-white">
                              <h5 class="card-title">Total Users</h5>
                              <p class="card-text">{{$user ?? 0}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-success">
                            <div class="card-body text-center text-white">
                              <h5 class="card-title">Total Cards</h5>
                              <p class="card-text">{{$card ?? 0}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-warning">
                            <div class="card-body text-center text-white">
                              <h5 class="card-title">Total Works</h5>
                              <p class="card-text">{{$work ?? 0}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-danger">
                            <div class="card-body text-center text-white">
                              <h5 class="card-title">Total Reports</h5>
                              <p class="card-text">{{$report ?? 0}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <style>
        .mainHeading{
            text-shadow: 1px 1px #0ec6d5;
            text-align: center!important;
            font-family: emoji;
        }
    </style>
@endsection
