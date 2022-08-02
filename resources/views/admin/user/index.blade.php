
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
                            <a href="{{ route('user.create') }}">
                                <div class="align-self-center">
                                    <button class="btn btn-primary btn-lg" tabindex="0"
                                        aria-controls="invoice-list"><span>Add
                                            New User</span></button>
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
                                        colspan="1" aria-label="Address: activate to sort column ascending"
                                        style="width: 257.047px;">Address</th>
                                    <th class="no-sort py-6 sorting_disabled" rowspan="1" colspan="1" aria-label="Actions"
                                        style="width: 67.5781px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr role="row" class="odd">
                                        <td class="align-middle"><a href="dashboard-preview-invoice.html"><span
                                                    class="inv-number">{{ $user->id }}</span></a>
                                        </td>
                                        <td class="align-middle"><span class="inv-amount">{{ $user->name }}</span>
                                        </td>
                                        <td class="align-middle"><span
                                                class="text-primary pr-1"></span>{{ $user->email }}</td>
                                        <td class="align-middle"><span
                                                    class="text-primary pr-1"></span>{{ $user->address }}</td>
                                        <td class="action-buttons align-middle">
                                            <a href="{{ route('user.edit',$user->id) }}"
                                                class="ebutton btn btn-primary"><i class="fal fa-pencil-alt"></i>Edit</a>
                                                <a class="ebutton btn btn-danger" onclick="return confirm('Are you sure to delete this card ?')" href="{{route('user.delete', $user->id)}}"><i class="fa fa-trash"></i>Delete</a>
                                        </td>
                                    </tr>
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

