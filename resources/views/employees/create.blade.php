@extends('layouts.app')

@section('title', 'HRIS | Employees')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Master Data</li>
                <li class="breadcrumb-item active"><a href="{{ route('index.employees')}}">Employee</a></li>
                <li class="breadcrumb-item active">Create Employee</li>
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
            <h3 class="fw-bold mb-2">Add Employee</h3>
        </div>
      
        <form action="{{ route('store.employee')}}" method="POST">
            @csrf
            <div class="card-body pt-3" id="dataPribadi">
                <div class="row mb-3">
                    <div class="col-md-6 col-12">
                        <label for="nik_ktp" class="mb-2">NIK KTP <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nik_ktp') is-invalid @enderror" name="nik_ktp"
                            id="nik_ktp" value="{{ old('nik_ktp')}}" placeholder="641xxxxx">

                        @error('nik_ktp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-12">
                        <label for="nip" class="mb-2">NIP</label>
                        <input type="text" class="form-control @error('nip') is-invalid @enderror" name="nip" id="nip"
                            value="{{ old('nip')}}" placeholder="23123122">

                        @error('nip')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6 col-12">
                        <label for="first_name" class="mb-2">First Name</label>
                        <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                            name="first_name" id="first_name" value="{{ old('first_name')}}" placeholder="First Name">

                        @error('first_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-12">
                        <label for="last_name" class="mb-2">Last Name</label>
                        <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                            name="last_name" id="last_name" value="{{ old('last_name')}}" placeholder="Last Name">

                        @error('last_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6 col-12">
                        <label for="department_id" class="mb-2">Department</label>
                        <select class="form-select @error('department_id') is-invalid @enderror select2"
                            id="department_id" name="department_id" data-placeholder="Select Department">
                            <option value="">Select Departement</option>
                            @foreach($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name}}</option>
                            @endforeach
                        </select>

                        @error('department_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-12">
                        <label for="job" class="mb-2">Job Title</label>
                        <select class="form-select @error('job_id') is-invalid @enderror select2" id="job_id"
                            name="job_id" data-placeholder="Select Job Title">
                            <option value="">Select Job Title</option>
                            @foreach($jobs as $job)
                            <option value="{{ $job->id }}">{{ $job->job_title}}</option>
                            @endforeach
                        </select>

                        @error('job_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6 col-12">
                        <label for="gender" class="mb-2">Gender</label>
                        <select class="form-select @error('gender') is-invalid @enderror select2" id="gender"
                            name="gender" data-placeholder="Select Gender">
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>

                        @error('gender')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-12">
                        <label for="religion" class="mb-2">Religion</label>
                        <select class="form-select @error('religion') is-invalid @enderror select2" id="religion"
                            name="religion" data-placeholder="Select Religion">
                            <option value="">Select Religion</option>
                            <option value="islam">Islam</option>
                            <option value="kristen">Kristen</option>
                            <option value="budha">Budha</option>
                            <option value="hindu">Hindu</option>
                            <option value="khonghucu">Khonghucu</option>
                        </select>

                        @error('religion')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6 col-12">
                        <label for="date_of_birth" class="mb-2">Birthday Date</label>
                        <input type="date" class="form-control" name="date_of_birth" id="date_of_birth">

                        @error('date_of_birth')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-12">
                        <label for="phone_number" class="mb-2">Phone Number</label>
                        <input type="tel" class="form-control" name="phone_number" id="phone_number"
                            placeholder="0812xxxx">

                        @error('phone_number')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>



                <div class="row mb-3">
                    <div class="col-12">
                        <label for="address">Address</label>
                        <textarea name="address" class="form-control" id="address"></textarea>
                    </div>
                </div>

            </div>

            <div class="card-footer d-flex justify-content-between">
                <a href="{{ route('index.employees')}}" class="btn btn-link">
                    <- Back</a>
                        <button type="submit" class="btn btn-primary ms-2">Save</button>
            </div>
        </form>
    </div>

</main><!-- End #main -->

@push('scripts')



<script>

</script>

@endpush
@endsection