
@extends('frontend.layouts.master')
@section('content')
<div class="page-content">
        @include('frontend.partials.header')
    @section('content')
        <main id="content" class="bg-gray-01">
            <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 invoice-listing" data-animated-id="1">
                @include('frontend.common.flash-message')
                <div class="mb-6">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-md-start justify-content-center">
                            <a href="{{ route('card.create') }}">
                                <div class="align-self-center">
                                    <button class="btn btn-primary btn-lg" tabindex="0"
                                        aria-controls="invoice-list"><span>Add
                                            New Card</span></button>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="table table-hover">
                    <div id="invoice-list_wrapper" class="dataTables_wrapper no-footer">
                        <table id="invoice-list" class="table table-hover bg-white border rounded-lg dataTable no-footer"
                            role="grid">
                            <thead>
                                <tr role="row">
                                    <th class="py-6 sorting" tabindex="0" aria-controls="invoice-list" rowspan="1"
                                        colspan="1" aria-label="Invoice Id: activate to sort column ascending"
                                        style="width: 77.6406px;">Id</th>
                                    <th class="py-6 sorting" tabindex="0" aria-controls="invoice-list" rowspan="1"
                                        colspan="1" aria-label="Name: activate to sort column ascending"
                                        style="width: 163.875px;">Name</th>
                                    <th class="py-6 sorting" tabindex="0" aria-controls="invoice-list" rowspan="1"
                                        colspan="1" aria-label="Email: activate to sort column ascending"
                                        style="width: 257.047px;">Email</th>
                                    <th class="py-6 sorting" tabindex="0" aria-controls="invoice-list" rowspan="1"
                                        colspan="1" aria-label="Date: activate to sort column ascending"
                                        style="width: 113.391px;">Phone</th>
                                    <th class="py-6 sorting" tabindex="0" aria-controls="invoice-list" rowspan="1"
                                        colspan="1" aria-label="Amount: activate to sort column ascending"
                                        style="width: 67.875px;">Image</th>
                                    <th class="no-sort py-6 sorting_disabled" rowspan="1" colspan="1" aria-label="Actions"
                                        style="width: 67.5781px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($cards as $card)
                                    @if(!$card->social_link == 1)
                                        <tr role="row" class="odd">
                                            <td class="align-middle"><a href="dashboard-preview-invoice.html"><span
                                                        class="inv-number">{{ $card->id }}</span></a>
                                            </td>
                                            <td class="align-middle"><span class="inv-amount">{{ $card->name }}</span>
                                            </td>
                                            <td class="align-middle"><span
                                                    class="text-primary pr-1"></span>{{ $card->email }}</td>
                                            <td class="align-middle"><span
                                                    class="text-success pr-1"></span>{{ $card->phone }}</td>
                                            <td class="align-middle">
                                                <div class="d-flex align-items-center">
                                                    <div class="usr-img-frame mr-2 rounded-circle">
                                                        <img alt="avatar" class="img-fluid rounded-circle w-30px"
                                            src="{{ asset('storage/images/'. $card->image) }}">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="action-buttons align-middle">
                                                <a href="{{ route('pages.card.detail',$card->id) }}"
                                                    class="ebutton btn btn-warning  text-white mr-2"><i class="fa fa-eye text-white"></i>view</a>
                                                <a href="{{ route('card.edit',$card->id) }}"
                                                    class="ebutton btn btn-primary"><i class="fal fa-pencil-alt"></i>Edit</a>
                                                    <a class="ebutton btn btn-danger" onclick="return confirm('Are you sure to delete this card ?')" href="{{route('card.delete', $card->id)}}"><i class="fa fa-trash"></i>Delete</a>
                                            </td>
                                        </tr>
                                    @endif    
                                @empty
                                    <h1 class="text-center">No Record Found</h1>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    @endsection
</div>

