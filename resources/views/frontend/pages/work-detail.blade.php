@extends('frontend.layouts.layout')
@section('content')
    <main id="content">
        <section class="pb-7 shadow-xs-1 position-relative z-index-1 mt-n17" data-animated-id="2">
            <div class="container pt-17">
                <div class="row" style="margin-top: 10%">
                    <div class="col-md-5">
                        <img src="{{ asset('storage/images/' . $work->image) }}" class="card-img" alt="">
                    </div>
                    <div class="col-md-7">
                        <div class="pl-md-10 pr-md-8 py-7">
                            <h2 class="fs-30 text-dark font-weight-600 lh-16 mb-0">
                                {{ $work->name }}</h2>
                            <p class="fs-16 font-weight-500 lh-213 mb-4">{{ $work->country }}</p>
                            <p class="mb-1">{{ $work->description }}</p>
                            <p class="mb-6">{{ $work->detail }}</p>
                            <hr class="mb-4">
                            <div class="row">
                                <div class="col-sm-6 mb-4">
                                    <p class="mb-0">Phone</p>
                                    <p class="text-heading font-weight-500 mb-0 lh-13">{{ $work->phone }}</p>
                                </div>
                                <div class="col-sm-6 mb-4">
                                    <p class="mb-0">Email</p>
                                    <p class="text-heading font-weight-500 mb-0 lh-13">{{ $work->email }}</p>
                                </div>
                                <div class="col-sm-6 mb-4">
                                    <p class="mb-0">Address</p>
                                    <p class="text-heading font-weight-500 mb-0 lh-13">{{ $work->address }}</p>
                                </div>
                                <div class="col-sm-6 mb-4">
                                    <p class="mb-0">Social Link</p>
                                    <p class="text-heading font-weight-500 mb-0 lh-13">{{ $work->social_link }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
