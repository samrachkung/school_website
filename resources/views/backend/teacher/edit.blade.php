@extends('backend.layout.master')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Teacher</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Edit Teacher</li>
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
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Teacher</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ url('/teacher/' . $teacher->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label>Teacher Code <code class="text-danger">*</code></label>
                                <input type="text" class="form-control" name="teacher_code" value="{{ $teacher->teacher_code }}" required>
                                @error('teacher_code')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Teacher Name <code class="text-danger">*</code></label>
                                <input type="text" class="form-control" name="teacher_name" value="{{ $teacher->teacher_name }}" required>
                                @error('teacher_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Date of Birth <code class="text-danger">*</code></label>
                                <input type="date" class="form-control" name="teacher_dob" value="{{ $teacher->teacher_dob }}" required>
                                @error('teacher_dob')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email <code class="text-danger">*</code></label>
                                <input type="email" class="form-control" name="teacher_email" value="{{ $teacher->teacher_email }}" required>
                                @error('teacher_email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Phone <code class="text-danger">*</code></label>
                                <input type="text" class="form-control" name="teacher_phone" value="{{ $teacher->teacher_phone }}" required>
                                @error('teacher_phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Profile</label>
                                <textarea class="form-control" name="teacher_profile">{{ $teacher->teacher_profile }}</textarea>
                                @error('teacher_profile')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Address <code class="text-danger">*</code></label>
                                <textarea class="form-control" name="address" required>{{ $teacher->address }}</textarea>
                                @error('address')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" class="form-control" name="teacher_photo">
                                @if ($teacher->teacher_photo)
                                <div class="mt-2">
                                    <img src="{{ asset('frontend/images/teacher_image/' . $teacher->teacher_photo) }}" alt="Category Image" width="100">
                                </div>
                            @endif
                                @error('teacher_photo')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Gender <code class="text-danger">*</code></label>
                                <select class="form-control" name="gender_id" required>
                                    <option value="">Select Gender</option>
                                    @foreach ($genders as $gender)
                                        <option value="{{ $gender->id }}" {{ $teacher->gender_id == $gender->id ? 'selected' : '' }}>
                                            {{ $gender->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('gender_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
