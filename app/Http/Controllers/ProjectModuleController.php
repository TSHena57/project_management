<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectModule;
use DataTables;

class ProjectModuleController extends Controller
{
    public function store(Request $request)
    {
        try {
            $request->validate([
                'module_name' => 'required|string',
                'project_phase_id' => 'nullable|numeric|gt:0',
                'project_id' => 'required|numeric|gt:0',
            ]);
            ProjectModule::create([
                            'module_name' => $request->module_name,
                            'project_phase_id' => $request->project_phase_id,
                            'description' => $request->description,
                            'project_id' => $request->project_id,
                            'is_active' => 1,
                        ]);
            
            return redirect()->back()->with('success', $request->module_name.' Added Successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $data['module'] = ProjectModule::find($id);
        return view('project_modules.edit', $data);
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'module_name' => 'required|string',
                'project_phase_id' => 'required|numeric|gt:0',
                'is_active' => 'required|in:0,1',
            ]);
            $module = ProjectModule::find($id);
            $module->update([
                            'module_name' => $request->module_name,
                            'project_phase_id' => $request->project_phase_id,
                            'description' => $request->description,
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
            $module = ProjectModule::find($request->id);
            if ($module->project_plans()->count() == 0) {
                $module->delete();
            }
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
