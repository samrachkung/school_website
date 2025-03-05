@extends('backend.layout.master')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Create Major Form</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/major')}}">Home</a></li>
                    <li class="breadcrumb-item active">Create Major Form</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Create Form</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{url('/major')}}" method="POST">
                    @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label">Major Type <code class="text-danger">*</code></label>
                        <input type="text" class="form-control" value="{{old('major_type')}}" name="major_type" placeholder="Enter Major Type">
                        @error('major_type')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label>Description <code class="text-danger">*</code></label>
                        <input type="text" class="form-control" value="{{old('description')}}" name="description" placeholder="Enter Major Description">
                        @error('description')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
                <!-- /.card -->

              </div>

        </div>
    </div>
</div>


@endsection
