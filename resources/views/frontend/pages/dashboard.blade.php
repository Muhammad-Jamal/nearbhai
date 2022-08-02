<header class="main-header shadow-none shadow-lg-xs-1 bg-white position-relative d-none d-xl-block">
    <div class="container-fluid">
        <nav class="navbar navbar-light py-0 row no-gutters px-3 px-lg-0">
            <div class="col-md-4 px-0 px-md-6 order-1 order-md-0">
            </div>
            <div class="col-md-6 d-flex flex-wrap justify-content-md-end order-0 order-md-1">
                <div class="dropdown border-md-right border-0 py-3 text-right">
                    <a href="#"
                        class="dropdown-toggle text-heading pr-3 pr-sm-6 d-flex align-items-center justify-content-end"
                        data-toggle="dropdown">
                        <div class="mr-4 w-48px">
                            <img src="{{ asset('frontend/images/testimonial-5.jpg') }}" alt="Ronald Hunter"
                                class="rounded-circle">
                        </div>
                        <div class="fs-13 font-weight-500 lh-1">
                            Welcome, {{ Auth::user()->name }}
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right w-100">
                        {{-- <a class="dropdown-item" href="#">My Profile</a> --}}
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
