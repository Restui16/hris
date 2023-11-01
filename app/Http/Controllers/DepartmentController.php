<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentStoreRequest;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::latest()->get();
        return view('departments.index', compact('departments'));
    }

    public function store(DepartmentStoreRequest $request)
    {
        $data = $request->validated();

        Department::create($data);
        return Redirect::back()->with('success', 'Department has been created');
    }

    public function update(DepartmentStoreRequest $request, string $id)
    {
        $data = $request->validated();
        Department::find($id)->update($data);
        return Redirect::back()->with('success', 'Department has been updated');   
    }

    public function destroy(string $id)
    {
        Department::find($id)->delete();
        return response()->json([
            'message' => "Department has been deleted"
        ]);
    }
}
