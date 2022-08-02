<script src="{{ asset('frontend/vendors/jquery.min.js') }}"></script>
            <script src="{{ asset('frontend/vendors/jquery-ui/jquery-ui.min.js') }}"></script>
            <script src="{{ asset('frontend/vendors/bootstrap/bootstrap.bundle.js') }}"></script>
            <script src="{{ asset('frontend/vendors/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
            <script src="{{ asset('frontend/vendors/slick/slick.min.js') }}"></script>
            <script src="{{ asset('frontend/vendors/waypoints/jquery.waypoints.min.js') }}"></script>
            <script src="{{ asset('frontend/vendors/counter/countUp.js') }}"></script>
            <script src="{{ asset('frontend/vendors/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
            <script src="{{ asset('frontend/vendors/chartjs/Chart.min.js') }}"></script>
            <script src="{{ asset('frontend/vendors/dropzone/js/dropzone.min.js') }}"></script>
            <script src="{{ asset('frontend/vendors/timepicker/bootstrap-timepicker.min.js') }}"></script>
            <script src="{{ asset('frontend/vendors/hc-sticky/hc-sticky.min.js') }}"></script>
            <script src="{{ asset('frontend/vendors/jparallax/TweenMax.min.js') }}"></script>
            <script src="{{ asset('frontend/vendors/mapbox-gl/mapbox-gl.js') }}"></script>
            <script src="{{ asset('frontend/vendors/dataTables/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('frontend/js/theme.js') }}"></script>
    @forelse ($cards as $card)
    <div class="col-xxl-4 col-lg-4 col-md-4 mb-6" data-animate="zoomIn">
        <div class="card border-0 bg-overlay-gradient-3 rounded-lg hover-change-image">
            <img src="{{ asset('storage/images/'. @$card->image) }}" class="card-img"
                alt="Villa on Hollywood Boulevard">
            <div class="card-img-overlay d-flex flex-column position-relative-sm">
                <div class="d-flex">
                    <div class="mr-auto h-24 d-flex">
                        <span class="badge badge-primary mr-2">{{ @$card->country }}</span>
                    </div>
                </div>
                <div class="mt-auto px-2">
                    <p class="fs-17 font-weight-bold text-white mb-0 lh-13">{{ $card->name }}</p>
                    <div class="row">
                        <div class="col-8">
                            <h4 class="mt-0 mb-2 lh-1 text-left">
                                <a href="" class="fs-16 text-white">{{ @$card->description }}</a>
                            </h4>
                        </div>
                        <div class="col-4">
                            <h6 class="mt-0 mb-2 text-right">
                                <a href="{{ route('pages.card.detail',$card->id) }}" class="text-right bg-primary viewBtn">View #{{$card->id}}</a>
                            </h6>
                        </div>
                    </div>
                    <div class="border-top border-white-opacity-03 pt-2">
                        <ul class="list-inline d-flex mb-0 flex-wrap mt-2 mt-lg-0 mr-n5">
                            <li class="list-inline-item text-white font-weight-500 fs-13 d-flex align-items-center">
                                <svg class="icon icon-bedroom fs-18 text-primary">
                                    <use xlink:href="{{ route('pages.card.detail',$card->id) }}"></use>
                                </svg>
                                {{ @$card->phone }}
                            </li>
                            <li class="list-inline-item text-white font-weight-500 fs-13 d-flex align-items-center">
                                <svg class="icon icon-shower fs-18 text-primary">
                                    <use xlink:href="{{ route('pages.card.detail',$card->id) }}"></use>
                                </svg>
                                {{ @$card->email }}
                            </li>
                            <li class="list-inline-item text-white font-weight-500 fs-13 d-flex align-items-center">
                                <svg class="icon icon-square fs-18 text-primary">
                            <use xlink:href="{{ route('pages.card.detail',$card->id) }}"></use>
                                </svg>
                                {{ @$card->address }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{ route('pages.card.detail',$card->id) }}">
        <h4 class="mt-5">{{ @$card->service }}</h4></a>
    </div>
    @empty
    <h1>No Record Found</h1>
    @endforelse
    {{-- {{ $cards->links('pagination::bootstrap-4') }} --}}
</div>
