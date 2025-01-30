@extends('backend.layout.master')
@section('m_menu-open','menu-open')
@section('m_active','active')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Major</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Major</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="row">
    <!-- /.col -->
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a href="{{url('/major/create')}}"><button class="btn btn-primary"><i class="far fa-edit"></i>Create Major</button></a>

                <div class="card-tools">
                    <ul class="pagination pagination-sm float-right">
                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 5%">No.</th>
                            <th style="width: 15%">Major Type</th>
                            <th style="width: 40%">Description</th>
                            <th style="width: 20%">Status</th>
                            <th style="width: 20%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($major as $key => $item)
                        <tr>
                            <td>{{$key + 1 }}</td>
                            <td>{{$item->major_type}}</td>
                            <td>{{$item->description}}</td>
                            <td>
                                <div class="progress progress-xs">
                                    <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                </div>
                            </td>
                            <td>
                                <a href="{{url('major/'.$item->id.'/edit')}}" class="btn btn-primary"><i class="far fa-edit"></i>Edit</a>
                                <form action="{{url('major/'.$item->id)}}" method="POST" class="d-inline delete-form">
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
    <!-- /.col -->
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
        toastr.success("{{session('flash_message')}}");
        @endif

        @if(session('info'))
        toastr.info("{{session('info')}}");
        @endif

        @if(session('error'))
        toastr.error("{{session('error')}}");
        @endif
    });
</script>
@endsection
