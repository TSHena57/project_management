<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Designation;
use DataTables;

class DesignationController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Designation::query();
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
                        return view('designations.components.action', compact('row'));
                    })
                    ->rawColumns(['is_active','action'])
                    ->make(true);
            return view('designations.index', $data);
        }
        return view('designations.index');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'is_active' => 'required|in:0,1',
            ]);
            $user = Designation::create([
                                'name' => $request->name,
                                'is_active' => $request->is_active,
                            ]);
            
            return redirect()->back()->with('success', 'Added Successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $data['designation'] = Designation::find($id);
        return view('designations.edit', $data);
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'is_active' => 'required|in:0,1',
            ]);
            $designation = Designation::find($id);
            $designation->update([
                            'name' => $request->name,
                            'is_active' => $request->is_active,
                        ]);
            
            return redirect()->back()->with('success', 'Updated Successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy(Request $request)
    {
        try {
            $designation = Designation::find($request->id);
            $designation->delete();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
