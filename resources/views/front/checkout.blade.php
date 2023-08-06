@extends('front.index')
@section('content')

    <div class="container-fluid pt-5">
        <div class="row px-xl-5">

            <div class="col-lg-8">
                <form class="register-form" action="{{ route('checkout.store') }}" method="POST">
                    @csrf
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>First Name</label>
                            <input class="form-control" name="shipping_name" type="text" value="{{\Illuminate\Support\Facades\Auth::user()->name}}">
                        </div>

                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" name="shipping_email" type="text" value="{{\Illuminate\Support\Facades\Auth::user()->email}}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" type="text" name="shipping_phone">
                        </div>


                        <div class="col-md-6 form-group">
                            <label>Country</label>
                            <select class="custom-select" name="city_id">
                                @foreach($cities as $item)
                                    <option value="{{ $item->id }}">{{ $item->city }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Country</label>
                            <select name="address_id" class="custom-select">
                                <option selected="">Select Address</option>

                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>specific address</label>
                            <input class="form-control" type="text" name="s_address" id="s_address">
                        </div>

                    </div>
                </div>

            </div>


            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3">Products</h5>
                        @foreach($carts as $cart)
                        <div class="d-flex justify-content-between">
                            <p>{{$cart->name}}</p>
                            <p>${{$cart->price}}</p>
                        </div>
                        @endforeach

                        <hr class="mt-0">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">FREE</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">${{$cartTotal}}</h5>
                        </div>
                    </div>
                </div>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Payment</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                <label class="custom-control-label" for="directcheck">Direct Check</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <button type="submit" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3" >Place Order</button>
                    </div>
                </div>
                </form>
            </div>

        </div>
    </div>


@endsection
