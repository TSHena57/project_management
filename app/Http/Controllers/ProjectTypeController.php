<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectType;
use DataTables;

class ProjectTypeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = ProjectType::query();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('is_active', function($row){
                        if ($row->is_active) {
                            return '<span class="badge bg-success">Active</span>';
                        } else {
                            return '<span class="badge bg-warning">In Active</span>';
                        }
                    })
                    ->addColumn('action', function($row){      
                        return view('project_types.components.action', compact('row'));
                    })
                    ->rawColumns(['is_active','action'])
                    ->make(true);
        }
        return view('project_types.index');
    }
}
