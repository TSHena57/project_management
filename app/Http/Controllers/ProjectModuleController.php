<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectModule;
use Illuminate\Support\Facades\DB;
use App\Traits\ProjectLogActivity;
use DataTables;

class ProjectModuleController extends Controller
{
    use ProjectLogActivity;

    public function store(Request $request)
    {
        try {
            $request->validate([
                'module_name' => 'required|string',
                'project_phase_id' => 'nullable|numeric|gt:0',
                'project_id' => 'required|numeric|gt:0',
            ]);
            DB::beginTransaction();
            ProjectModule::create([
                            'module_name' => $request->module_name,
                            'project_phase_id' => $request->project_phase_id,
                            'description' => $request->description,
                            'project_id' => $request->project_id,
                            'is_active' => 1,
                        ]);
            $this->addLog(auth()->id(),$request->project_id,0,$request->module_name.' has been created by '.auth()->user()->name);
            
            DB::commit();
            
            return redirect()->back()->with('success', $request->module_name.' Added Successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
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
            DB::beginTransaction();
            $module = ProjectModule::find($id);
            $module->update([
                            'module_name' => $request->module_name,
                            'project_phase_id' => $request->project_phase_id,
                            'description' => $request->description,
                            'is_active' => $request->is_active,
                        ]);
            $this->addLog(auth()->id(),$module->project_id,0,$request->module_name.' has been created by '.auth()->user()->name);
            DB::commit();
            
            return redirect()->back()->with('success', 'Updated Successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    
    public function destroy(Request $request)
    {
        try {
            $module = ProjectModule::find($request->id);
            DB::beginTransaction();
            if ($module->project_plans()->count() == 0) {

                $this->addLog(auth()->id(),$module->project_id,0,$module->module_name.' has been deleted by '.auth()->user()->name);
                $module->delete();
            }
            
            DB::commit();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
