<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ProjectLogActivity;
use App\Models\ProjectPlan;
use Carbon\Carbon;
use DataTables;

class ProjectPlanController extends Controller
{
    use ProjectLogActivity;

    public function list_for_select_ajax(Request $request)
    {
        $items = ProjectPlan::query();

        if ($request->search != '') {
            $items = $items->whereLike(['task_name','current_status'], $request->search);
        }

        // Paginate the results
        $items = $items->with(['project'])->paginate(10);
        $response = [];
        foreach ($items as $item) {
            $response[] = [
                'id'    => $item->id,
                'text'  => $item->task_name,
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
                'project_module_id' => 'nullable|numeric|gt:0',
                'project_phase_id' => 'nullable|numeric|gt:0',
                'project_id' => 'nullable|numeric|gt:0',
                'employee_id' => 'nullable|numeric|min:0',
                'task_name' => 'required|string',
                'task_details' => 'nullable',
                'task_duration_hrs' => 'nullable|numeric|min:0',
                'priority' => 'nullable|numeric|min:0',
                'start_date' => 'nullable',
                'end_date' => 'nullable',
                'current_status' => 'required|in:On Hold,To Do,In Progress,Testing,Completed,Error Solving',
            ]);
            ProjectPlan::create([
                            'project_module_id' => $request->project_module_id,
                            'project_phase_id' => $request->project_phase_id,
                            'project_id' => $request->project_id,
                            'employee_id' => $request->employee_id,
                            'task_name' => $request->task_name,
                            'task_details' => $request->task_details,
                            'task_duration_hrs' => $request->task_duration_hrs,
                            'start_date' => Carbon::parse($request->start_date)->format('Y-m-d'),
                            'end_date' => Carbon::parse($request->end_date)->format('Y-m-d'),
                            'priority' => $request->priority,
                            'current_status' => $request->current_status,
                        ]);

            $this->addLog(auth()->id(),$request->project_id,$request->project_module_id,$request->task_name.' has been created');

            return redirect()->back()->with('success', 'Added Successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $data['plan'] = ProjectPlan::with(['employee'])->find($id);
        return view('projects.components.edit_task', $data);
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'employee_id' => 'nullable|numeric|min:0',
                'task_name' => 'required|string',
                'task_details' => 'nullable',
                'task_duration_hrs' => 'nullable|numeric|min:0',
                'priority' => 'nullable|numeric|min:0',
                'start_date' => 'nullable',
                'end_date' => 'nullable',
                'current_status' => 'required|in:On Hold,To Do,In Progress,Testing,Completed,Error Solving',
            ]);
            $plan = ProjectPlan::find($id);
            $plan->update([
                            'employee_id' => $request->employee_id,
                            'task_name' => $request->task_name,
                            'task_details' => $request->task_details,
                            'task_duration_hrs' => $request->task_duration_hrs,
                            'start_date' => Carbon::parse($request->start_date)->format('Y-m-d'),
                            'end_date' => Carbon::parse($request->end_date)->format('Y-m-d'),
                            'priority' => $request->priority,
                            'current_status' => $request->current_status,
                        ]);

            $this->addLog(auth()->id(),$plan->project_id,$plan->project_module_id,$plan->task_name.' has been updated by '.auth()->user()->name);
            
            return redirect()->back()->with('success', 'Updated Successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    
    public function destroy(Request $request)
    {
        try {
            $projectType = ProjectPlan::find($request->id);
            $projectType->delete();

            $this->addLog(auth()->id(),$plan->project_id,$plan->project_module_id,$plan->task_name.' has been removed by '.auth()->user()->name);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
