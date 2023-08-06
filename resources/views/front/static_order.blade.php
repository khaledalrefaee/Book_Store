@extends('front.index')
@section('content')


    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">
        <!-- Content Header (Page header) -->




<div class="container">


    <section class="content">
        <div class="row">


            <div class="col-md-6 col-12">
                <div class="box box-bordered border-primary">
                    <div class="box-header with-border">
                        <h4 class="box-title"><strong>Shipping Details</strong> </h4>

                    </div>


                    <table class="table">
                        <tr>
                            <th> Shipping Name : </th>
                            <th> {{ $order->name }} </th>
                        </tr>

                        <tr>
                            <th> Shipping Phone : </th>
                            <th> {{ $order->phone }} </th>
                        </tr>

                        <tr>
                            <th> Shipping Email : </th>
                            <th> {{ $order->email }} </th>
                        </tr>

                        <tr>
                            <th> Division : </th>
                            <th> {{ $order->city->city }} </th>
                        </tr>

                        <tr>
                            <th> District : </th>
                            <th> {{ $order->address->address }} </th>
                        </tr>


                        <tr>
                            <th> Order Date : </th>
                            <th> {{ $order->order_date }} </th>
                        </tr>

                    </table>



                </div>
            </div> <!--  // cod md -6 -->


            <div class="col-md-6 col-12">
                <div class="box box-bordered border-primary">
                    <div class="box-header with-border">
                        <h4 class="box-title"><strong>Order Details</strong><span class="text-danger"> Invoice : {{ $order->invoice_no }}</span></h4>
                    </div>


                    <table class="table">
                        <tr>
                            <th>  Name : </th>
                            <th> {{ $order->user->name }} </th>
                        </tr>

                        <tr>
                            <th>  Phone : </th>
                            <th> {{ $order->user->phone }} </th>
                        </tr>

                        <tr>
                            <th> Payment Type : </th>
                            <th> {{ $order->payment_type }} </th>
                        </tr>


                        <tr>
                            <th> Invoice  : </th>
                            <th class="text-danger"> {{ $order->invoice_no }} </th>
                        </tr>

                        <tr>
                            <th> Order Total : </th>
                            <th>${{ $order->amount }} </th>
                        </tr>

                        <tr>
                            <th> Order : </th>
                            <th>
                                <span class="badge badge-pill badge-warning" style="background: #418DB9;">{{ $order->status }} </span> </th>
                        </tr>
                        <tr>
                            <th>  </th>

                        </tr>



                    </table>



                </div>
            </div> <!--  // cod md -6 -->





            <div class="col-md-12 col-12">
                <div class="box box-bordered border-primary">
                    <div class="box-header with-border">

                    </div>



                    <table class="table">
                        <tbody>

                        <tr>
                            <td width="10%">
                                <label for=""> Image</label>
                            </td>

                            <td width="20%">
                                <label for=""> Product Name </label>
                            </td>


                            <td width="10%">
                                <label for=""> Price </label>
                            </td>

                        </tr>






                        </tbody>

                    </table>











                </div>
            </div>  <!--  // cod md -12 -->
















        </div>
        <!-- /. end row -->
    </section>
</div>

        <!-- Main content -->

        <!-- /.content -->

    </div>




@endsection
