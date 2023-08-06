@extends('front.index')
@section('content')
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-3 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        <div>
                            <img class="w-100 h-100" src="{{asset($book->image)}}" alt="Image" >
                        </div>

                    </div>

                </div>
            </div>

            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold">{{$book->name}}</h3>
                <div class="d-flex mb-3">

                    <div class="col-lg-7 pb-5">
                        <h5 class="font-weight-semi-bold"><span>author:</span>{{$book->author}}</h5>
                        <div class="d-flex mb-3">


                </div>
                <h3 class="font-weight-semi-bold mb-4">${{$book->price}}</h3>
                <p class="mb-4">{{$book->description}}</p>




                    <button class="btn btn-primary px-3" onclick="addToCart({{$book->id}})"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</button>
                </div>

            </div>
        </div>

    </div>

@endsection
