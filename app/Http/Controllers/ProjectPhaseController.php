<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectPhase;
use DataTables;

class ProjectPhaseController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = ProjectPhase::query();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('is_active', function($row){
                        if ($row->is_active) {
                            return '<span class="badge bg-success">Active</span>';
                        } else {
                            return '<span class="badge bg-warning">In Active</span>';
                        }
                    })
                    ->addColumn('action', function($row){      
                        return view('project_phase.components.action', compact('row'));
                    })
                    ->rawColumns(['is_active','action'])
                    ->make(true);
        }
        return view('project_phase.index');
    }

    public function list_for_select_ajax(Request $request)
    {
        $items = ProjectPhase::query();
        $items = $items->where('is_active', 1);

        if ($request->search != '') {
            $items = $items->whereLike(['name'], $request->search);
        }

        // Paginate the results
        $items = $items->paginate(10);
        $response = [];
        foreach ($items as $item) {
            $response[] = [
                'id'    => $item->id,
                'text'  => $item->name,
            ];
        }

        $data['results'] = $response;
        if ($items->hasMorePages()) {
            $data['pagination'] = ['more' => true];
        }

        return response()->json($data);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'is_active' => 'required|in:0,1',
            ]);
            ProjectPhase::create([
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
        $data['phase'] = ProjectPhase::find($id);
        return view('project_phase.edit', $data);
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'is_active' => 'required|in:0,1',
            ]);
            $phase = ProjectPhase::find($id);
            $phase->update([
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
            $phase = ProjectPhase::find($request->id);
            if ($phase->projects()->count() == 0) {
                $phase->delete();
            }
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
