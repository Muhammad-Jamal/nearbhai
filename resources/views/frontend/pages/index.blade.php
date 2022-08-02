@extends('frontend.layouts.layout')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@section('content')
    <section>
        <div style="width:100%;position: relative;background-image: url('https://www.mensjournal.com/wp-content/uploads/mf/1280-man-tool-garage.jpg?w=1200&h=630&crop=1&quality=86&strip=all"
            class="py-lg-17 py-11 bg-cover">
            <div class="d-none d-xl-block order-xl-2">
                <ul class="navbar-nav">
                    <li class="nav-item " style="background-color:rgba(14, 198, 213, 0.5)">
                        {{-- <a class="btn btn-lg text-dark rounded-lg bg-hover-primary border-hover-primary hover-white d-none d-lg-block"
                            href="">
                            Add Your Card/Work
                        </a> --}}
                        @guest
                            <a href="{{ route('register') }}" class="btn-track d-flex" style="color:rgba(255, 255, 255, 1)">
                                <div class="--icon">
                                <div class="circle-inner"></div>
                                <div class="circle-outer"></div>
                                <svg width="24" height="24" viewBox="0 0 24 24" id="box">
                                <path d="M0 6L5 0H19L24 6V11H0V6Z" fill="#FDDDB3"/>
                                <path d="M0.835938 5L5 0H11.5L10 5H0.835938ZM12.5 0L14 5H23.1667L19 0H12.5ZM0 22.5V6H10V10.5L12 9.5L14 10.5V6H24V22.5C24 23.3284 23.3284 24 22.5 24H1.5C0.671573 24 0 23.3284 0 22.5Z" fill="#B39056"/>
                                <rect x="6" y="13" width="12" height="3" rx="0.25" fill="white"/>
                                </svg>
                                <div class="ml-2"><b>Add Your Card/Work</b></div>
                            </a>
                        @endguest

                        @auth
                        <a href="{{ route('home') }}" class="btn-track d-flex" style="color:rgba(255, 255, 255, 1)">
                            <div class="--icon">
                            <div class="circle-inner"></div>
                            <div class="circle-outer"></div>
                            <svg width="24" height="24" viewBox="0 0 24 24" id="box">
                            <path d="M0 6L5 0H19L24 6V11H0V6Z" fill="#FDDDB3"/>
                            <path d="M0.835938 5L5 0H11.5L10 5H0.835938ZM12.5 0L14 5H23.1667L19 0H12.5ZM0 22.5V6H10V10.5L12 9.5L14 10.5V6H24V22.5C24 23.3284 23.3284 24 22.5 24H1.5C0.671573 24 0 23.3284 0 22.5Z" fill="#B39056"/>
                            <rect x="6" y="13" width="12" height="3" rx="0.25" fill="white"/>
                            </svg>
                            <div class="ml-2"><b>Dashboard</b></div>
                        </a>
                        @endauth

                    </li>

                </ul>
            </div>
            <div class="container mt-lg-9 p-5" data-animate="zoomIn" style="background-color:rgba(14, 198, 213, 0.5);border: 2px solid #0ec6d5;">
                <p class="text-primary text-center text-dark fs-md-22 fs-20 font-weight-600">Find Your Service Here</p>
                <h2 class="text-dark text-center display-3 text-white font-weight-light mb-10">Searching for Services</h2>
                <div class="mxw-670 position-relative z-index-2 mb-3">
                    <input class="search-field" type="hidden" name="status" value="for-sale" data-default-value="">
                    <form class="d-flex" method="get" action="{{route('get-serach-result')}}">
                        @csrf
                        <div class="position-relative w-100 d-flex justify-content-center align-items-center">
                            {{-- <i class="far fa-search text-dark fs-18 position-absolute pl-4 pos-fixed-left-center"></i> --}}
                            <input type="text"
                                class=" mr-3 rounded-bottom-right-lg w-50 pl-8 py-4 bg-white border-0 fs-13 font-weight-500 text-gray-light rounded-0 lh-17"
                                placeholder="Enter the name of service" name="name">
                            <input type="text"
                                class=" mr-3 rounded-bottom-right-lg w-50 pl-8 py-4 bg-white border-0 fs-13 font-weight-500 text-gray-light rounded-0 lh-17"
                                placeholder="Enter an country" name="country">
                        </div>
                        <button type="submit" class="btn btn-primary fs-16 font-weight-600 rounded-left-0 rounded-lg">
                            Search
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="pt-lg-12 pt-11 pb-11">

        <div class="tabs">
        <div class="tab-button-outer">
          <ul id="tab-button">
            <li><a href="#tab03">
                    <div class="row flex-lg-row flex-cloumn">
                        <div class="col-lg-12 col-xxl-12 mb-5">
                            <h4 class="text-heading mt-5">Business Card</h4>
                        </div>
                    </div>
                </a>
            </li>
            <li><a href="#tab02">
                    <div class="row flex-lg-row flex-cloumn">
                        <div class="col-lg-12 col-xxl-12 mb-5">
                            <h4 class="text-heading mt-5 ">Work Services</h4>
                        </div>
                    </div>
                </a>
            </li>
          </ul>
        </div>

        <div id="tab03" class="tab-contents">
            <div class="container container-xxl">
                <div class="tab-content p-0 shadow-none" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
                        <div class="row" id="all_cards">
                            @include('frontend.pages.services')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="tab02" class="tab-contents">
            <div class="container container-xxl">
                <div class="row">
                @forelse ($works as $work)
                    <div class="col-sm-6 mt-5">
                      <div class="card">
                        <div class="card-body" style="border: 3px solid #0ec6d5;">
                          <h5 class="card-title"><b class="text-dark">Name :</b> {{ $work->name }}</h5>
                          <div class="row">
                            <div class="col-7">
                                <small><h6 class="card-title"><b>Email :</b> {{ $work->email }}</h6></small>
                            </div>
                            <div class="col-5">
                                <small><h6 class="card-title"><b>Phone :</b> {{ $work->phone }}</h6></small>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                                <div class="col-md-8">
                                    <h6 class="card-title"><b>Address :</b> {{ $work->address }}</h6>
                                </div>
                                <div class="col-md-4">
                                    <h6 class="card-title"><b>City :</b> {{ $work->country }}</h6>
                                </div>
                                <div class="col-md-12">
                                    <h6 class="card-title"><b>Budget :</b> {{ $work->budget }}</h6>
                                </div>
                                <div class="col-12">
                                    <h6 class="card-title"><b>Description :</b> {{ $work->description }}</h6>
                                </div>
                                <div class="col-12">
                                    <h6 class="card-title text-center"><b>Detail :</b> {{ $work->detail }}</h6>
                                </div>
                          </div>
                          <hr>
                          <small style="color: #0ec6d5;"><b>POST by <span class="text-uppercase">{{$work->user->name}} / {{$work->user->email}}</span></b></small>

                        </div>
                      </div>
                    </div>
                @empty
                    <h1>No Record Found</h1>
                @endforelse
                </div>
            </div>
        </div>
      </div>
    </section>

    <section>
        <div
        class="py-lg-5 py-6 bg-cover container-fluid">
            <div class="row">
                <div class="col-md-12 mb-5">
                    <div class="help">
                        <a href="{{ route('report') }}"><span style="color:#0EC6D5;height:100px;width:100px;"><i class="fa-solid fa-envelope"></i>&nbsp;&nbsp;</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<style>
.tabs {
  margin: 0 auto;
  padding: 0 20px;
}
#tab-button {
  display: table;
  table-layout: fixed;
  width: 100%;
  margin: 0;
  padding: 0;
  list-style: none;
}
#tab-button li {
  display: table-cell;
  width: 20%;
}
#tab-button li a {
  display: block;
  padding: .5em;
  background: #eee;
  border: 1px solid #ddd;
  text-align: center;
  color: #000;
  text-decoration: none;
}
#tab-button li:not(:first-child) a {
  border-left: none;
}
#tab-button li a:hover,
#tab-button .is-active a {
  border-bottom-color: transparent;
  background: #0ec6d5;
}
.tab-contents {
  padding: .5em 2em 1em;

}

.tab-button-outer {
  display: none;
}
.tab-contents {
  margin-top: 40px !important;
}
@media screen and (min-width: 768px) {
  .tab-button-outer {
    position: relative;
    z-index: 2;
    display: block;
  }
  .tab-select-outer {
    display: none;
  }
  .tab-contents {
    position: relative;
    top: -1px;
    margin-top: 0;
  }
}
</style>
@endsection
