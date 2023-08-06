@extends('front.index')
@section('content')
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Your Order In Process</h1>
        <br>
        <h4 class="box-title"><strong style="color: #009a43">Borrowed for <bold>5 Days</bold></strong> </h4>
        <br>
        <div class="d-inline-flex">
            <div>
                <a href="{{route('static.order')}}"> <button class="btn btn-primary btn-block border-0 py-3" type="submit">See your Order</button></a>

            </div>
        </div>
    </div>

@endsection
