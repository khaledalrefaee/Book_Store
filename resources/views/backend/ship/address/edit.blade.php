@extends('backend.index')
@section('content')


    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">






                <!--   ------------ Add District Page -------- -->


                <div class="col-6">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit District </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">


                                <form method="post" action="{{ route('district.update',$address->id ) }}" >
                                    @csrf



                                    <div class="form-group">
                                        <h5>Division Select <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="city_id" class="form-control"  >
                                                <option value="" selected="" disabled="">Select Division</option>
                                                @foreach($city as $div)
                                                    <option value="{{ $div->id }}" {{ $div->id == $address->city_id ? 'selected': '' }} >{{ $div->city }}</option>
                                                @endforeach
                                            </select>
                                            @error('city_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <h5>District Name  <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text"  name="address" class="form-control" value="{{ $address->address }}" >
                                            @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
                                    </div>
                                </form>





                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>




            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>




@endsection
