@extends('frontend.layouts.master')
@section('content')
<div class="page-content">
    @include('frontend.partials.header')
    <main id="content" class="bg-gray-01">
        <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 my-profile" data-animated-id="1">
            <div class="mb-6">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-md-start justify-content-center">
                        <a href="{{ route('card.index') }}">
                        <div class="align-self-center">
                            <button class="btn btn-primary btn-lg" tabindex="0" aria-controls="invoice-list"><span>Back</span></button>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="collapse-tabs new-property-step">
                <div class="tab-content shadow-none p-0">
                    <form action="{{ route('card.update',$card->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div id="collapse-tabs-accordion">
                            <div class="tab-pane tab-pane-parent fade show active px-0" id="description" role="tabpanel"
                                aria-labelledby="description-tab">
                        <div class="card bg-transparent border-0">
                            <div id="description-collapse" class="collapse show collapsible"
                                aria-labelledby="heading-description" data-parent="#collapse-tabs-accordion">
                                <div class="card-body py-4 py-md-0 px-0">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12-col-sm-12">
                                            <div class="card mb-6">
                                                <div class="card-body p-6">
                                                    <div class="form-group">
                                                        <label for="name" class="text-heading">Name <span
                                                                class="text-muted"></span></label>
                                                        <input type="text"
                                                            class="form-control form-control-lg border-0"
                                                            id="name" name="name" value="{{ $card->name }}">
                                                    </div>
                                                    @error('name')
                                                    <strong class="text-danger">
                                                        {{ $message }}
                                                    </strong>
                                                    @enderror
                                                    <br>
                                                    <div class="form-group">
                                                        <label for="name" class="text-heading">Service<span
                                                                class="text-muted"></span></label>
                                                        <input type="text"
                                                            class="form-control form-control-lg border-0"
                                                            id="name" name="service" value="{{ $card->service }}">
                                                    </div>
                                                    @error('service')
                                                    <strong class="text-danger">
                                                        {{ $message }}
                                                    </strong>
                                                    @enderror
                                                    <br>
                                                    <div class="form-group">
                                                        <label for="email" class="text-heading">Email <span
                                                                class="text-muted"></span></label>
                                                        <input type="text"
                                                            class="form-control form-control-lg border-0"
                                                            id="email" name="email" value="{{ $card->email }}">
                                                    </div>
                                                    @error('email')
                                                    <strong class="text-danger">
                                                        {{ $message }}
                                                    </strong>
                                                    @enderror
                                                    <br>
                                                    <div class="form-group">
                                                        <label for="phone" class="text-heading">Phone <span
                                                                class="text-muted"></span></label>
                                                        <input type="text"
                                                            class="form-control form-control-lg border-0"
                                                            id="phone" name="phone"
                                                            value="{{ $card->phone }}">
                                                    </div>
                                                    @error('phone')
                                                    <strong class="text-danger">
                                                        {{ $message }}
                                                    </strong>
                                                    @enderror
                                                    <br>
                                                    <div class="form-group">
                                                        <label for="address" class="text-heading">Address
                                                            <span class="text-muted"></span></label>
                                                        <input type="text"
                                                            class="form-control form-control-lg border-0"
                                                            id="address" name="address"
                                                            value="{{$card->address}}">
                                                    </div>
                                                    @error('address')
                                                    <strong class="text-danger">
                                                        {{ $message }}
                                                    </strong>
                                                    @enderror
                                                    <br>
                                                    <div class="form-group">
                                                        <label for="link" class="text-heading">Social Link
                                                            <span class="text-muted"></span></label>
                                                        <input type="url"
                                                            class="form-control form-control-lg border-0"
                                                            id="link" name="social_link"
                                                            value="{{$card->social_link}}">
                                                    </div>
                                                    @error('social_link')
                                                    <strong class="text-danger">
                                                        {{ $message }}
                                                    </strong>
                                                    @enderror
                                                    <br>
                                                    <div class="form-group">
                                                        <label for="country" class="text-heading">Country
                                                            <span class="text-muted"></span></label>
                                                        <input type="text"
                                                            class="form-control form-control-lg border-0"
                                                            id="country" name="country"
                                                            value="{{$card->country}}">
                                                    </div>
                                                    @error('country')
                                                    <strong class="text-danger">
                                                        {{ $message }}
                                                    </strong>
                                                    @enderror
                                                    <br>
                                                    <div class="form-group">
                                                        <label for="time" class="text-heading">Time <span
                                                                class="text-muted"></span></label>
                                                        <input type="text"
                                                            class="form-control form-control-lg border-0"
                                                            id="time" name="time"
                                                            value="{{ $card->time }}">
                                                    </div>
                                                    <div class="form-group mb-0">
                                                        <label for="description-01"
                                                            class="text-heading">Description</label>
                                                        <textarea class="form-control border-0" rows="5" name="description" id="description-01">
                                                            {{$card->description}}</textarea>
                                                    </div>
                                                    <div class="form-group mb-0">
                                                        <label for="detail-01"
                                                            class="text-heading">Detail</label>
                                                        <textarea class="form-control border-0" rows="5" name="detail" id="detail-01">
                                                            {{$card->detail}}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="image" class="text-heading">Image <span
                                                                class="text-muted"></span></label>
                                                        <input type="file"
                                                            class="form-control form-control-lg border-0"
                                                            id="image" name="image">
                                                    </div>
                                                    @if ($card->image == null)
                                                    <p>No Image Found</p>
                                                    @else
                                                    <div class="d-flex align-items-center">
                                                        <div class="usr-img-frame mr-2 rounded-circle">
                                                            <img alt="avatar" class="img-fluid rounded-circle w-30px"
                                                src="{{ asset('storage/images/'. $card->image) }}">
                                                        </div>
                                                    </div>
                                                    @endif
                                                    @error('image')
                                                    <strong class="text-danger">
                                                        {{ $message }}
                                                    </strong>
                                                    @enderror
                                                    <br>

                                                    <div class="mt-4 form-group mb-0 text-center">
                                                        <input type="submit" name="submit" value="Update Card" class="btn btn-lg btn-primary">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection
