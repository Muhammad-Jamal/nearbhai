@extends('frontend.layouts.master')
@section('content')
    <div class="page-content">
        @include('frontend.partials.header')
        <main id="content" class="bg-gray-01">
            <div class=" px-lg-2 px-xxl-13 py-lg-2 my-profile" data-animated-id="1">
                <h3 class="text-center mainHeading">Welcome To Business Card Website</h3>
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
