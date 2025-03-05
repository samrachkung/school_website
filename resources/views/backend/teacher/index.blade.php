@extends('backend.layout.master')
@section('t_menu-open','menu-open')
@section('t_active','active')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Teachers</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item active">Teachers</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ url('/teacher/create') }}">
                    <button class="btn btn-primary"><i class="far fa-edit"></i> Create Teacher</button>
                </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 5%">No.</th>
                            <th style="width: 5%">Image.</th>
                            <th style="width: 10%">Code</th>
                            <th style="width: 10%">Name</th>
                            <th style="width: 10%">Date of Birth</th>
                            <th style="width: 15%">Email</th>
                            <th style="width: 10%">Phone</th>
                            <th style="width: 10%">Address</th>
                            <th style="width: 10%">Gender</th>
                            <th style="width: 25%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teachers as $key => $teacher)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $teacher ->teacher_photo ? asset($teacher ->teacher_photo) : asset('frontend/images/teacher_image/placeholder.png') }}</td>
                            <td>{{ $teacher->teacher_code }}</td>
                            <td>{{ $teacher->teacher_name }}</td>
                            <td>{{ $teacher->teacher_dob }}</td>
                            <td>{{ $teacher->teacher_email }}</td>
                            <td>{{ $teacher->teacher_phone }}</td>
                            <td>{{ Str::limit($teacher->address, 20) }}</td>
                            <td>{{ $teacher->gender->name ?? 'N/A' }}</td>
                            <td>
                                <a href="{{ url('teacher/' . $teacher->id . '/edit') }}" class="btn btn-primary btn-sm">
                                    <i class="far fa-edit"></i> Edit
                                </a>
                                <form action="{{ url('teacher/' . $teacher->id) }}" method="POST" class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger delete-btn btn-sm">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection

@section('alert_message')
<script>
    $(function() {
        // SweetAlert delete confirmation
        $('.delete-btn').click(function(e) {
            e.preventDefault(); // Prevent default form submission

            let form = $(this).closest('form'); // Get the form

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Submit the form programmatically
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    });
                }
            });
        });

        @if(session('flash_message'))
        toastr.success("{{ session('flash_message') }}");
        @endif

        @if(session('info'))
        toastr.info("{{ session('info') }}");
        @endif

        @if(session('error'))
        toastr.error("{{ session('error') }}");
        @endif
    });
</script>
@endsection
