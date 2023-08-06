@extends('front.index')
@section('content')
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-12">

            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-12 col-md-12">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <form action="">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search by name">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-transparent text-primary">
                                            <i class="fa fa-search"></i>
                                        </span>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    @foreach($books as $book)
                    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="{{asset($book->image)}}" style="height: 600px">
                            </div>

                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3" id="bname">{{$book->name}}</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>${{$book->price}}</h6><h6 class="text-muted ml-2"></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="{{route('book.details',$book->id)}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                <a href=""><button  class="btn btn-sm text-dark p-0" onclick="addToCart({{$book->id}})"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</button></a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
@endsection
