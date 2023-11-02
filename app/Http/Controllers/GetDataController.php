<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Job;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables as DataTablesDataTables;
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

    public function getDataEmployees(Request $request)
    {
        $employees = Employee::with(['Department', 'Job'])->latest()->get();
        return DataTables::of($employees)
            ->addIndexColumn()
            ->addColumn('name', function($employee){
                $name = $employee->first_name . ' ' . $employee->last_name; 
                return '
                    '.$name.'
                ';
            })
            ->addColumn('action', function($employee){
                $editUrl = route('edit.employee', $employee->id);
                return'
                    <div class="d-flex">
                        <a href="'.$editUrl.'" class="btn btn-warning btn-sm me-2"> Edit </a>
                        <a href="#" onclick="confirmDelete(this)" data-id="' . $employee->id . '" class="btn btn-danger btn-sm">Delete</a>
                    </div>
                    ';
            })
            ->rawColumns(['name', 'action'])
            ->make();
    }
}
