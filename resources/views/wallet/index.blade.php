
@extends('frontend.layouts.master')
@include('frontend.partials.header')
@section('content')
<div class="page-content zol-md-12">
        <main id="content" class="bg-gray-01">
            <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 invoice-listing" data-animated-id="1">
                @include('frontend.common.flash-message')
                <div class="mb-6">
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6 d-flex justify-content-md-start">
                            <div class="align-self-center">
                                <button class="btn btn-primary btn-lg" tabindex="0"
                                    aria-controls="invoice-list" data-toggle="modal" data-target="#walletModel"><span>Add
                                        Receiver Wallet</span></button>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6 d-flex justify-content-md-end">
                            <div class="align-self-center">
                                <button class="btn btn-primary btn-lg enableEthereumButton" id="load_metamask_btn"><span class="showAccount">
                                        Connect Wallet</span></button>
                                        
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table table-hover">
                    <div id="invoice-list_wrapper" class="dataTables_wrapper no-footer">
                        <table id="invoice-list" class="table table-hover bg-white border rounded-lg dataTable no-footer"
                            role="grid">
                            <thead>
                                <tr role="row">
                                    <th class="py-6 sorting"  aria-controls="invoice-list"
                                        aria-label="Invoice Id: activate to sort column ascending"
                                        >Id</th>
                                    <th class="py-6 sorting"  aria-controls="invoice-list"
                                        aria-label="Name: activate to sort column ascending"
                                       >Wallet ID</th>
                                    <th class="no-sort py-6 sorting_disabled"  aria-label="Actions" colspan="4"
                                        >Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($wallets as $wallet)
                                    <tr role="row" class="odd">
                                        <td class="align-middle"><a href="dashboard-preview-invoice.html"><span
                                                    class="inv-number">{{ $wallet->id }}</span></a>
                                        </td>
                                        <td class="align-middle"><span class="inv-amount">{{ $wallet->name }}</span>
                                        </td>
                                        <td class="align-middle"><span
                                                class="text-primary pr-1"></span>{{ $wallet->wallet }}</td>

                                        <td class="action-buttons align-left">
                                            <a href=""
                                                class="ebutton btn btn-primary" data-toggle="modal" data-target="#walletEditModel-{{$wallet->id}}"><i class="fal fa-pencil-alt"></i>Edit</a>
                                                <a class="ebutton btn btn-danger" onclick="return confirm('Are you sure to delete this card ?')" href="{{route('wallet.delete',$wallet->id)}}"><i class="fa fa-trash"></i>Delete</a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="walletEditModel-{{$wallet->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header bg-header">
                                              <h5 class="modal-title text-white" id="exampleModalCenterTitle">Edit Wallet Address</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('wallet.update',$wallet->id)}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="wallet_id" value="{{$wallet->id}}">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Wallet Address</label>
                                                        <input type="wallet" class="form-control" name="wallet" value="{{$wallet->wallet}}">
                                                        <small id="emailHelp" class="form-text text-muted">We'll never share your wallet address with anyone else.</small>
                                                    </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save wallet</button>
                                                    </div>
                                                </form>
                                          </div>
                                        </div>
                                    </div>
                                @empty
                                    {{-- <h1 class="text-center">No Record Found</h1> --}}
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>

</div>
<div class="modal fade" id="walletModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h5 class="modal-title text-white" id="exampleModalCenterTitle">Add Wallet</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('wallet.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Wallet Address</label>
                    <input type="wallet" class="form-control" name="wallet">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your wallet address with anyone else.</small>
                </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save wallet</button>
                </div>
            </form>
      </div>
    </div>
</div>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>

    $("#load_metamask_btn").click(function(){
       
       EThAppDeploy.loadEtherium();
    });
    


        EThAppDeploy = {
            loadEtherium: async () => {
                if (typeof window.ethereum !== 'undefined') {
                    EThAppDeploy.web3Provider = ethereum;
                    EThAppDeploy.requestAccount(ethereum);
                } else {
                    alert(
                        "Not able to locate an Ethereum connection, please install a Metamask wallet"
                    );
                }
            },
            /****
             * Request A Account
             * **/
            requestAccount: async (ethereum) => {
                ethereum
                    .request({
                        method: 'eth_requestAccounts'
                    })
                    .then((resp) => {
                        //do payments with activated account
                        EThAppDeploy.payNow(ethereum, resp[0]);
                    })
                    .catch((err) => {
                        // Some unexpected error.
                        console.log(err);
                    });
            },
            /***
             *
             * Do Payment
             * */
            payNow: async (ethereum, from) => {
                const ethereumButton = document.querySelector('.enableEthereumButton');
                const showAccount = document.querySelector('.showAccount');
                ethereumButton.addEventListener('click', () => {
                  getAccount();
                });

                async function getAccount() {
                  const accounts = await ethereum.request({ method: 'eth_requestAccounts' });
                  const account = accounts[0];
                  showAccount.innerHTML = account;
                }
                var amount = $('#inp_amount').val();
                ethereum
                    .request({
                        method: 'eth_sendTransaction',
                        params: [{
                            from: from,
                            to: "{~Your Account Addree~}",
                            value: '0x' + ((amount * 1000000000000000000).toString(16)),
                        }, ],
                    })
                    .then((txHash) => {
                        if (txHash) {
                            console.log(txHash);
                            //Store Your Transaction Here
                        } else {
                            console.log("Something went wrong. Please try again");
                        }
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },
        }
</script>
@endsection
