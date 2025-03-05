@extends('backend.layout.master')
@section('content')

<div class="container-fluid">
    <div class="row mb-4 align-items-center">
        <div class="col-sm-6">
            <a href="{{url('/teacher')}}"><h1 class="m-0 text-primary fw-bold">Create Teacher</h1></a>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg rounded-lg">
                <div class="card-header bg-gradient-primary text-white text-center py-3">
                    <h3 class="card-title fw-bold m-0">Create Teacher</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('/teacher') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Teacher Code <code class="text-danger">*</code></label>
                                    <input type="text" class="form-control shadow-sm" name="teacher_code">
                                    @error('teacher_code')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Teacher Name <code class="text-danger">*</code></label>
                                    <input type="text" class="form-control shadow-sm" name="teacher_name">
                                    @error('teacher_name')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Date of Birth <code class="text-danger">*</code></label>
                            <input type="date" class="form-control shadow-sm" name="teacher_dob">
                            @error('teacher_dob')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Email <code class="text-danger">*</code></label>
                                    <input type="email" class="form-control shadow-sm" name="teacher_email">
                                    @error('teacher_email')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Phone <code class="text-danger">*</code></label>
                                    <input type="text" class="form-control shadow-sm" name="teacher_phone">
                                    @error('teacher_phone')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Address <code class="text-danger">*</code></label>
                            <textarea class="form-control shadow-sm" name="address" rows="2"></textarea>
                            @error('address')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Description <code class="text-danger">*</code></label>
                            <textarea class="form-control shadow-sm" name="teacher_dec" rows="2"></textarea>
                            @error('teacher_dec')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Profile Detail <code class="text-danger">*</code></label>
                            <textarea class="form-control shadow-sm" name="teacher_profile" rows="2"></textarea>
                            @error('teacher_profile')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Image <code class="text-danger">*</code></label>
                            <input type="file" class="form-control shadow-sm" name="teacher_photo">
                            @error('teacher_photo')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="mb-4">
                            <label class="form-label fw-bold">Gender <code class="text-danger">*</code></label>
                            <select class="form-select shadow-sm rounded-3 bg-light" name="gender_id">
                                <option value="" disabled selected>-- Select Gender --</option>
                                @foreach ($genders as $gender)
                                    <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                                @endforeach
                            </select>
                            @error('gender_id')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="text-center">
                            <button type="submit" class="btn btn-primary px-5 py-2 fw-bold shadow-sm">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
