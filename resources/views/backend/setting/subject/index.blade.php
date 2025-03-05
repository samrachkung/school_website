@extends('backend.layout.master')
@section('m_menu-open', 'menu-open')
@section('s_active', 'active')
@section('content')


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Subjects</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/subject')}}">Home</a></li>
                    <li class="breadcrumb-item active">Subjects</li>
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
                <a href="{{ url('/subject/create') }}">
                    <button class="btn btn-primary"><i class="far fa-edit"></i> Create Subject</button>
                </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 5%">No.</th>
                            <th style="width: 20%">Subject Name</th>
                            <th style="width: 20%">Course</th>
                            <th style="width: 20%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subjects as $key => $subject)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $subject->subject_name }}</td>
                            <td>{{ $subject->course->course_name ?? 'N/A' }}</td>
                            <td>
                                <a href="{{ url('subject/' . $subject->id . '/edit') }}" class="btn btn-primary">
                                    <i class="far fa-edit"></i> Edit
                                </a>
                                <form action="{{ url('subject/' . $subject->id) }}" method="POST" class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger delete-btn">
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
