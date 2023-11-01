@extends('layouts.app')

@section('title', 'HRIS | Jobs')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Master Data</li>
                <li class="breadcrumb-item active">Jobs</li>
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
                <h1 class="fw-bold fs-3 text-black">Jobs</h1>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createJob"><span><i class="bi bi-plus-circle"></i></span> Create
                    Job </button>
            </div>
            @include('jobs.create-modal')

        </div>
        <div class="card-body pt-3">
            <table class="table table-responsive" style="width: 100%;" id="tableJobs">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Job Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    @include('jobs.edit-modal')
</main><!-- End #main -->

@push('scripts')



<script>
    $(document).ready(function() {
            $('#tableJobs').DataTable({
                processing: true,
                serverside: true,
                ajax: '/getJobs/',
                columns:[
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'job_title',
                        name: 'job_title'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                   
                    
                ]
            });
        });
</script>

@endpush
@endsection