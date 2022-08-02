<div class="db-sidebar bg-white">
    <nav class="navbar navbar-expand-xl navbar-light d-block px-0 header-sticky dashboard-nav py-0">
        <div class="sticky-area shadow-xs-1 py-3">
            <div class="w-100">
                <a class=" text-center" href="{{ route('pages.index') }}">
                    <!--<img src="{{ asset('frontend/images/logo.png') }}" alt="HomeID">-->
                    <h3 class="text-center" style="border-bottom: 4px solid #0ec6d5;">NearBhai</h3>
                </a>
            </div>
            <div class="collapse navbar-collapse bg-white" id="primaryMenuSidebar">
                <ul class="list-group list-group-flush w-100">
                    <li class="list-group-item pt-6 pb-4">
                        <!-- <h5 class="fs-13 letter-spacing-087 text-muted mb-3 text-uppercase px-3">Dashboard
                        </h5> -->
                        <ul class="list-group list-group-no-border rounded-lg">
                            <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item {{Request::segment(1) == 'home' ? 'active text-white' : ''}}">
                                <a href="{{route('home')}}" class="text-heading lh-1 sidebar-link {{Request::segment(1) == 'home' ? 'text-dark' : ''}}">
                                    <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20 fs-20">
                                        <svg class="icon icon-add-new">
                                            <use xlink:href="#icon-add-new"></use>
                                        </svg></span>
                                    <span class="sidebar-item-text">Dashboard</span>
                                </a>
                            </li>
                            <li class="list-group-item px-3 px-xl-4 py-2 {{Request::segment(1) == 'user' && (Request::segment(2) == 'index' || Request::segment(2) == 'edit') ? 'active' : ''}}">
                                <a href="{{route('user.edit',auth()->user()->id)}}" class="text-heading lh-1 sidebar-link">
                                    <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20 fs-20">
                                        <svg class="icon icon-add-new">
                                            <use xlink:href="#icon-add-new"></use>
                                        </svg>
                                    </span>
                                    <span class="sidebar-item-text">Profile</span>
                                </a>
                            </li>
                            @if(auth()->user()->role == 'admin')

                                <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                                    <a href="{{ route('user.index') }}" class="text-heading lh-1 sidebar-link">
                                        <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20 fs-20">
                                            <svg class="icon icon-add-new">
                                                <use xlink:href="#icon-add-new"></use>
                                            </svg>
                                        </span>
                                        <span class="sidebar-item-text">Users</span>
                                    </a>
                                </li>

                            @endif
                            <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                                <a href="{{ route('wallet.index') }}" class="text-heading lh-1 sidebar-link">
                                    <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20 fs-20">
                                        <svg class="icon icon-add-new">
                                            <use xlink:href="#icon-add-new"></use>
                                        </svg></span>
                                    <span class="sidebar-item-text">Wallet</span>
                                </a>
                            </li>
                            {{-- @if(auth()->user()->role ==  'user')
                                <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                                    <a href="{{ route('card.create') }}" class="text-heading lh-1 sidebar-link">
                                        <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20 fs-20">
                                            <svg class="icon icon-add-new">
                                                <use xlink:href="#icon-add-new"></use>
                                            </svg></span>
                                        <span class="sidebar-item-text">Add New Card</span>
                                    </a>
                                </li>
                            @endif --}}

                            <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item {{Request::segment(1) == 'card' && Request::segment(2) == 'index' ? 'active' : ''}}">
                                <a href="{{ route('card.index') }}" class="text-heading lh-1 sidebar-link">
                                    <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20 fs-20">
                                        <svg class="icon icon-add-new">
                                            <use xlink:href="#icon-add-new"></use>
                                        </svg></span>
                                    <span class="sidebar-item-text">View Cards</span>
                                </a>
                            </li>
                            @if(auth()->user()->role == 'admin')

                                <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                                    <a href="{{ route('card.suspended') }}" class="text-heading lh-1 sidebar-link">
                                        <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20 fs-20">
                                            <svg class="icon icon-add-new">
                                                <use xlink:href="#icon-add-new"></use>
                                            </svg>
                                        </span>
                                        <span class="sidebar-item-text">Suspended Card</span>
                                    </a>
                                </li>

                            @endif
                            {{-- @if(auth()->user()->role == 'user')
                                <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                                    <a href="{{ route('work.create') }}" class="text-heading lh-1 sidebar-link">
                                        <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20 fs-20">
                                            <svg class="icon icon-add-new">
                                                <use xlink:href="#icon-add-new"></use>
                                            </svg></span>
                                        <span class="sidebar-item-text">Add New Work</span>
                                    </a>
                                </li>
                            @endif --}}

                            <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item {{Request::segment(1) == 'work' && Request::segment(2) == 'index' ? 'active' : ''}}">
                                <a href="{{ route('work.index') }}" class="text-heading lh-1 sidebar-link">
                                    <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20 fs-20">
                                        <svg class="icon icon-add-new">
                                            <use xlink:href="#icon-add-new"></use>
                                        </svg></span>
                                    <span class="sidebar-item-text">View Work</span>
                                </a>
                            </li>
                            
                            @if(auth()->user()->role == 'admin')
                            <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                                <a href="{{route('show.report')}}" class="text-heading lh-1 sidebar-link">
                                    <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20 fs-20">
                                        <svg class="icon icon-add-new">
                                            <use xlink:href="#icon-add-new"></use>
                                        </svg></span>
                                    <span class="sidebar-item-text">Reports</span>
                                </a>
                            </li>
                            @endif
                            <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" class="text-heading lh-1 sidebar-link">
                                    <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20 fs-20">
                                        <svg class="icon icon-add-new">
                                            <use xlink:href="#icon-add-new"></use>
                                        </svg></span>
                                    <span class="sidebar-item-text">logout</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
