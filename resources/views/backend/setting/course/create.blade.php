@extends('backend.layout.master')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Create Course Form</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/course')}}">Home</a></li>
                    <li class="breadcrumb-item active">Create Course Form</li>
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
                        <h3 class="card-title">Create Course</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ url('/course') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <!-- Course Code -->
                            <div class="form-group">
                                <label>Course Code <code class="text-danger">*</code></label>
                                <input type="text" class="form-control" value="{{ old('course_code') }}" name="course_code" placeholder="Enter Course Code">
                                @error('course_code')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Course Name -->
                            <div class="form-group">
                                <label>Course Name <code class="text-danger">*</code></label>
                                <input type="text" class="form-control" value="{{ old('course_name') }}" name="course_name" placeholder="Enter Course Name">
                                @error('course_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Syllabus -->
                            <div class="form-group">
                                <label>Syllabus</label>
                                <textarea class="form-control" name="syllabus" placeholder="Enter Course Syllabus">{{ old('syllabus') }}</textarea>
                                @error('syllabus')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Duration -->
                            <div class="form-group">
                                <label>Duration (in months) <code class="text-danger">*</code></label>
                                <input type="number" class="form-control" value="{{ old('duration') }}" name="duration" placeholder="Enter Duration">
                                @error('duration')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Course Price -->
                            <div class="form-group">
                                <label>Course Price <code class="text-danger">*</code></label>
                                <input type="number" step="0.01" class="form-control" value="{{ old('course_price') }}" name="course_price" placeholder="Enter Course Price">
                                @error('course_price')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Major ID -->
                            <div class="form-group">
                                <label>Major <code class="text-danger">*</code></label>
                                <select class="form-control" name="major_id">
                                    <option value="">Select Major</option>
                                    @foreach($majors as $major)
                                        <option value="{{ $major->id }}" {{ old('major_id') == $major->id ? 'selected' : '' }}>
                                            {{ $major->major_type}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('major_id')
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
