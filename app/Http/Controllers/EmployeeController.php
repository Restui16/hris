<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EmployeeController extends Controller
{
    public function index()
    {
        // $employees = Employee::with('department');
        // dd($employees);
        return view('employees.index');
    }

    public function create()
    {
        $departments = Department::orderBy('name', 'asc')->get();
        $jobs = Job::orderBy('job_title', 'asc')->get();
        return view('employees.create', compact('departments', 'jobs'));
    }

    public function store(StoreEmployeeRequest $request)
    {
        $data = $request->validated();

        Employee::create($data);

        return Redirect::route('index.employees')->with('success', 'Employee has been created');

    }

    public function edit(string $id)
    {
        $employees = Employee::find($id);
        // dd($employees);
        $departments = Department::orderBy('name', 'asc')->get();
        $jobs = Job::orderBy('job_title', 'asc')->get();
        return view('employees.edit', compact('departments', 'jobs', 'employees'));
    }

    public function update(UpdateEmployeeRequest $request, string $id)
    {
        $data = $request->validated();

        Employee::find($id)->update($data);
        return Redirect::route('index.employees')->with('success', 'Employee has been updated');
    }

    public function destroy(string $id)
    {
        Employee::find($id)->delete();
        return response()->json([
            'message' => 'Employee has been deleted'
        ]);
    }
}
