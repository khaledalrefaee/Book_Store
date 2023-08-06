@extends('backend.index')
@section('content')


    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">



                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">District List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>city Name </th>
                                        <th>address Name </th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($address as $item)
                                        <tr>
                                            <td> {{ $item->cities->city}}  </td>
                                            <td> {{ $item->address }}  </td>

                                            <td width="40%">
                                                <a href="{{ route('district.edit',$item->id) }}" class="btn btn-info" title="Edit Data">edit</i> </a>
                                                <a href="{{ route('district.delete',$item->id) }}" class="btn btn-danger" title="Delete Data" id="delete">
                                                    <i class="fa fa-trash"></i></a>
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col -->


                <!--   ------------ Add District Page -------- -->


                <div class="col-4">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add District </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">


                                <form method="post" action="{{ route('district.store') }}" >
                                    @csrf



                                    <div class="form-group">
                                        <h5>Division Select <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="city_id" class="form-control"  >
                                                <option value="" selected="" disabled="">Select Division</option>
                                                @foreach($city as $div)
                                                    <option value="{{ $div->id }}">{{ $div->city }}</option>
                                                @endforeach
                                            </select>
                                            @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <h5>District Name  <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text"  name="address" class="form-control" >
                                            @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">
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
