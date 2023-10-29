<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class GetDataController extends Controller
{
    public function getDataDepartements()
    {
        $departements = Departement::latest()->get();
        return DataTables::of($departements)
            ->addIndexColumn()
            ->addColumn('action', function ($departements) {
                return '
                <div class="d-flex justify-content-center align-items-center">
                    <button type="button" class="btn btn-warning me-2" data-bs-toggle="modal" data-bs-target="#editDepartement'.$departements->id.'">
                    Edit
                    </button>
                
                    <a href="#" onclick="confirmDelete(this)" data-id="'.$departements->id.'" class="btn btn-danger">Delete</a>
                </div>
                ';
            })
            ->rawColumns(['action'])
            ->make();
    }
}
