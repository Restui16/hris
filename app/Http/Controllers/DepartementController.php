<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartementStoreRequest;
use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Facades\DataTables;

class DepartementController extends Controller
{
    public function index()
    {
        $departements = Departement::latest()->get();
        return view('departements.index', compact('departements'));
    }

    public function store(DepartementStoreRequest $request)
    {
        $data = $request->validated();

        Departement::create($data);
        return Redirect::back()->with('success', 'Departement has been created');
    }

    public function update(DepartementStoreRequest $request, string $id)
    {
        $data = $request->validated();
        Departement::find($id)->update($data);
        return Redirect::back()->with('success', 'Departement has been updated');   
    }

    public function destroy(string $id)
    {
        Departement::find($id)->delete();
        return response()->json([
            'message' => "Departement has been deleted"
        ]);
    }
}
