@extends('backend.index')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">



            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable with minimal features &amp; hover style</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12">
                                        <form method="POST" action="{{route('store.book')}}" enctype="multipart/form-data">
                                            @csrf
                                            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                                        <div class="container-fluid">
                                            <div class="row mb-2">

                                                <div class="col-sm-6">
                                                    <h1>Book Add</h1>
                                                </div><div class="col-sm-6">
                                                    <ol class="breadcrumb float-sm-right">
                                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                                        <li class="breadcrumb-item active">Book Add</li>
                                                    </ol>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="card card-primary">
                                                <div class="card-header">
                                                    <h3 class="card-title">General</h3>

                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="inputName">Book Name</label>
                                                        <input name="name" type="text" id="inputName" class="form-control">
                                                    </div>



                                                    <div class="form-group">
                                                        <label for="inputDescription">Book Description</label>
                                                        <textarea name="description" id="inputDescription" class="form-control" rows="4"></textarea>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="inputName">prise Book</label>
                                                        <input name="price" type="number" id="inputName" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="inputName">Book quantity </label>
                                                        <input   name="quantity" type="number" id="inputName" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputName">auther </label>
                                                        <input name="author" type="text" id="inputName" class="form-control"  class="@error('author') is-invalid @enderror" value="{{ old('author') }}">
                                                    </div>
                                                        @error('author')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    
                                                    <div class="form-group">
                                                        <label for="inputStatus">Catygories</label>
                                                        <select name="category_id" id="inputStatus" class="form-control custom-select">
                                                            <option selected="" disabled="">Catygories</option>
                                                            @foreach($category as $item)
                                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                            @endforeach


                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputClientCompany">published date</label>
                                                        <input name="published_date" type="text" id="inputClientCompany" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">image book</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input  type="file" id="image" name="image">
{{--                                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>--}}
                                                            </div>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">Upload</span>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer">
                                                            <button type="submit" class="btn btn-primary">Add </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>
                                        </form>
                                    </div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example2_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example2_previous"><a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection

