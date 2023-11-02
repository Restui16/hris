@extends('layouts.app')

@section('title', 'HRIS | Employees')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Master Data</li>
                <li class="breadcrumb-item active">Employees</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    {{-- @if ($errors->any())
    @foreach ($errors->all() as $error)
    <p class="alert alert-danger" role="alert">{{ $error }}</p>
    @endforeach
    @endif --}}

    <div class="card">
        <div class="card-header">
            <div class="col-lg-12 d-flex justify-content-between align-items-center">
                <h1 class="fw-bold fs-3 text-black">Employees</h1>
                <a class="btn btn-primary" href="{{ route('create.employee')}}"><i class="bi bi-plus-circle me-2"></i>Create
                    Employee</a>
            </div>
            

        </div>
        <div class="card-body pt-3">
            <table class="table table-responsive table-hover" style="width: 100%;" id="tableEmployees">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nip</th>
                        <th>Nik KTP</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Department</th>
                        <th>Job Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

</main><!-- End #main -->

@push('scripts')



<script>
   $(document).ready(function() {
            $('#tableEmployees').DataTable({
                scrollX: true,
                processing: true,
                serverSide: true,
                ajax: '/getEmployees/',
                columns:[
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'nip',
                        name: 'nip',
                    },
                    {
                        data: 'nik_ktp',
                        name: 'nik_ktp',
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'gender',
                        name: 'gender',
                        className: 'text-capitalize'
                    },
                    {
                        data: 'department.name',
                        name: 'department.name'
                    },
                    {
                        data: 'job.job_title',
                        name: 'job.job_title'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                   
                    
                ]
            });
        });
</script>

@endpush
@endsection