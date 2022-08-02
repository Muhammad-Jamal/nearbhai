@extends('frontend.layouts.layout')
@section('content')
<div class="row">
    @forelse ($works as $work)
        <div class="col-sm-6 mt-5">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><b>Name :</b> {{ $work->name }}</h5>
              <hr>
              <div class="row">
                    <div class="col-md-12">
                        <h6 class="card-title"><b>Email :</b> {{ $work->email }}</h6>
                    </div>
                    <div class="col-md-6">
                        <h6 class="card-title"><b>Phone :</b> {{ $work->phone }}</h6>
                    </div>
                    <div class="col-md-6">
                        <h6 class="card-title"><b>Address :</b> {{ $work->address }}</h6>
                    </div>
                    <div class="col-md-6">
                        <h6 class="card-title"><b>City :</b> {{ $work->country }}</h6>
                    </div>
                    <div>
                        <h6 class="card-title"><b>Budget :</b> {{ $work->budget }}</h6>
                    </div>
              </div>
              <h6 class="card-title text-center"><b>Description :</b> {{ $work->description }}</h6>

              <p class="card-text"><b>Detail :</b> {{ $work->detail }}</p>
            </div>
          </div>
        </div>
    @empty
        <h1>No Record Found</h1>
    @endforelse
    </div>
@endsection
