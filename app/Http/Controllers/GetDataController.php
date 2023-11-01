<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Job;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class GetDataController extends Controller
{
    public function getDataDepartements()
    {
        $departements = Department::latest()->get();
        return DataTables::of($departements)
            ->addIndexColumn()
            ->addColumn('action', function ($departements) {
                return '
                <div class="d-flex justify-content-center align-items-center">
                    <button type="button" class="btn btn-warning me-2" data-bs-toggle="modal" data-bs-target="#editDepartement' . $departements->id . '">
                    Edit
                    </button>
                
                    <a href="#" onclick="confirmDelete(this)" data-id="' . $departements->id . '" class="btn btn-danger">Delete</a>
                </div>
                ';
            })
            ->rawColumns(['action'])
            ->make();
    }

    public function getDataJobs()
    {
        $jobs = Job::latest()->get();
        return DataTables::of($jobs)
            ->addIndexColumn()
            ->addColumn('action', function ($jobs) {
                return '
                <div class="d-flex justify-content-center align-items-center">
                    <button type="button" class="btn btn-warning btn-sm me-2" data-bs-toggle="modal" data-bs-target="#editJob'.$jobs->id.'">
                        Edit
                    </button>
            
                    <a href="#" onclick="confirmDelete(this)" data-id="' . $jobs->id . '" class="btn btn-danger btn-sm">Delete</a>
                </div>
                ';
            })
            ->rawColumns(['action'])
            ->make();
    }
}
