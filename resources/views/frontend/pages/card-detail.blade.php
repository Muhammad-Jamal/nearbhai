@extends('frontend.layouts.layout')

@section('content')
    <main id="content">
        <section class="pb-7 shadow-xs-1 position-relative z-index-1 mt-n17" data-animated-id="2">
            <div class="pt-17">
                <div class="container-fluid">
                    <div class="row bg-primary py-3">
                        <div class="md-4">
                           <a href="{{ route('pages.index') }}" class="text-heading lh-1 sidebar-link {{Request::segment(1) == 'home' ? 'text-dark' : ''}}">
                                <h4 class="sidebar-item-text ml-3">NearBhai</h4>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row" style="margin-top:5%">
                    <div class="col-md-5">
                        <img src="{{ asset('storage/images/' . $cardInfo->image) }}" class="card-img" alt="">
                        <small><b>POST by <span class="text-uppercase">{{$user->name}} / {{$user->email}}</span></b></small><br>
                        {{-- <button class="btn btn-primary">Purchse Card</button> --}}
                        @if(auth()->user()->role == "admin")
                            @if($cardInfo->social_link == 1)
                            <form method="post" action="{{route('card.suspend' , $cardInfo->id)}}">
                                @csrf
                                <input type="hidden" name="suspend" value="0">
                                <button class="btn btn-primary btn-lg" type="submit">
                                    <span>Unsuspend Card</span>
                                </button>
                            </form>
                            @else
                            <form method="post" action="{{route('card.suspend' , $cardInfo->id)}}">
                                @csrf
                                <input type="hidden" name="suspend" value="1">
                                <button class="btn btn-primary btn-lg" type="submit">
                                    <span>Suspend Card</span>
                                </button>
                            </form>
                            @endif
                        @else
                        <button class="btn btn-primary btn-lg" tabindex="0" aria-controls="invoice-list" data-toggle="modal" data-target="#purchaseModel">
                            <span>Purchse Card</span>
                        </button>
                        @endif
                    </div>
                    <div class="col-md-7">
                        <div class="pl-md-10 pr-md-8">
                            <h2 class="fs-30 text-dark font-weight-600 lh-16 mb-0">
                                {{ $cardInfo->name }}</h2>
                            <p class="fs-16 font-weight-500 lh-213 mb-4">{{ $cardInfo->country }}</p>
                            <p class="mb-1">{{ $cardInfo->description }}</p>
                            <div class="row">
                                <div class="col-md-6"><p class="mb-6">{{ $cardInfo->detail }}</p></div>    
                                <div class="col-md-6"><p class="mb-6">{{ $cardInfo->service }}</p></div>
                            </div>
                            <hr class="mb-4">
                            <div class="row">
                                <div class="col-sm-6 mb-4">
                                    <p class="mb-0">Phone</p>
                                    <p class="text-heading font-weight-500 mb-0 lh-13">{{ $cardInfo->phone }}</p>
                                </div>
                                <div class="col-sm-6 mb-4">
                                    <p class="mb-0">Email</p>
                                    <p class="text-heading font-weight-500 mb-0 lh-13">{{ $cardInfo->email }}</p>
                                </div>
                                <div class="col-sm-6 mb-4">
                                    <p class="mb-0">Address</p>
                                    <p class="text-heading font-weight-500 mb-0 lh-13">{{ $cardInfo->address }}</p>
                                </div>
                                <div class="col-sm-6 mb-4">
                                    <p class="mb-0">Timing</p>
                                    <p class="text-heading font-weight-500 mb-0 lh-13">{{ $cardInfo->time }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </section>
    </main>
<div class="modal fade" id="purchaseModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h5 class="modal-title text-white" id="exampleModalCenterTitle">Purchase Card</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="exampleInputEmail1">Wallet</label>
                    <select name="purchase_wallet" id="purchase_Wallet" class="form-control required">
                        
                        @if(isset(auth()->user()->wallet) && !empty(auth()->user()->wallet))
                            <option class="disabled text-center" value="">---Select wallet---</option>
                            @forelse(auth()->user()->wallet as $wallet)
                                <option value="{{$wallet->wallet}}">{{$wallet->wallet}}</option>
                            @empty
                                
                            @endforelse
                        @else
                            <option class="disabled text-center" value="">---no wallet to select---</option>
                        @endif
                    </select>
                    {{-- <input type="wallet" class="form-control" name="wallet"> --}}
                    <small id="emailHelp" class="form-text text-muted">We'll never share your wallet address with anyone else.</small>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Amount</label>
                    <input type="text" class="form-control" name="amount" id="inp_amount"  data-price="{{$cardInfo->price ?? "2"}}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary"  onClick="startProcess()">Purchase</button>
                </div>
          </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        function startProcess() {
            if($("select[name='purchase_wallet']").val() != "" && $("select[name='purchase_wallet']").val() !='undefined' && $("select[name='purchase_wallet']").val() != null){
                if ($('#inp_amount').val() > 0) {
                    // run metamsk functions here
                    EThAppDeploy.loadEtherium();
                } else {
                    alert('Please Enter Valid Amount');
                }
            }else{
                alert('Please Enter Wallet address');
            }
        }


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
                    var amount = $('#inp_amount').val();

                    ethereum
                        .request({
                            method: 'eth_sendTransaction',
                            params: [{
                                from: from,
                                to: $("select[name='purchase_wallet']").val(),
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

