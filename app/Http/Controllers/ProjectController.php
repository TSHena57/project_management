<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\ProjectLogActivity;
use App\Models\Project;
use App\Models\ProjectPlan;
use App\Models\ProjectPhase;
use App\Models\ProjectModule;
use App\Models\ProjectType;
use Carbon\Carbon;
use DataTables;

class ProjectController extends Controller
{
    use ProjectLogActivity;
    
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Project::with(['client','client.user:id,name','project_manager','project_manager.user:id,name']);
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){      
                        return view('projects.components.action', compact('row'));
                    })
                    ->editColumn('open_date', function($row){
                        return date('d/m/Y',strtotime($row->open_date));
                    })
                    ->editColumn('close_date', function($row){
                        return $row->close_date ? date('d/m/Y',strtotime($row->close_date)) : 'n/a';
                    })
                    ->editColumn('project_value', function($row){
                        return currencySymbol( $row->project_value );
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            return view('projects.index', $data);
        }
        return view('projects.index');
    }

    public function create()
    {
        $data['types'] = ProjectType::where('is_active',1)->get();
        return view('projects.create', $data);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'client_id' => 'required|numeric|gt:0',
                'project_manager_id' => 'nullable|numeric|min:0',
                'project_name' => 'required|string',
                'open_date' => 'nullable',
                'close_date' => 'nullable',
                'project_value' => 'required|numeric|min:0',
                'description' => 'nullable',
                'project_current_status' => 'required|in:Not Started,On Hold,Planning,In Progress,Running,Completed,Cancelled,At Risk,Failed',
                'awarded_by' => 'nullable',
            ]);
            DB::beginTransaction();
            
            $project = Project::create([
                                'client_id' => $request->client_id,
                                'project_manager_id' => $request->project_manager_id,
                                'project_name' => $request->project_name,
                                'slug' => str_replace(' ','-',strtolower($request->project_name)).'-'.date('is'),
                                'open_date' => Carbon::parse($request->open_date)->format('Y-m-d'),
                                'close_date' => Carbon::parse($request->close_date)->format('Y-m-d'),
                                'project_value' => $request->project_value,
                                'description' => $request->description,
                                'project_current_status' => $request->project_current_status,
                                'project_type_id' => $request->project_type_id,
                                'awarded_by' => $request->awarded_by,
                            ]);

            $this->addLog(auth()->id(),$project->id,0,$request->project_name.' has been created as A NEW Project by '.auth()->user()->name);
            
            DB::commit();
            
            return redirect()->route('projects.show', $project->id)->with('success', 'Added Successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $data['project'] = Project::with(['client','project_manager'])->find($id);
        return view('projects.edit', $data);
    }

    public function show($id)
    {
        $data['project'] = Project::with(['client','project_manager','project_teams','project_teams.employee'])->find($id);
        $data['module_phases'] = ProjectModule::with(['project_phase:id,name','project_plans','project_plans.employee','project_plans.creator:id,name,avatar'])->where('project_id',$id)->get()->groupBy(['project_phase.name']);
                                
        return view('projects.show', $data);
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'client_id' => 'required|numeric|gt:0',
                'project_manager_id' => 'nullable|numeric|min:0',
                'project_name' => 'required|string',
                'open_date' => 'nullable',
                'close_date' => 'nullable',
                'project_value' => 'required|numeric|min:0',
                'description' => 'nullable',
                'project_current_status' => 'required|in:Not Started,On Hold,Planning,In Progress,Running,Completed,Cancelled,At Risk,Failed',
                'awarded_by' => 'nullable',
            ]);
            DB::beginTransaction();
            $project = Project::find($id);
            $project->update([
                            'client_id' => $request->client_id,
                            'project_manager_id' => $request->project_manager_id,
                            'project_name' => $request->project_name,
                            'slug' => str_replace(' ','-',strtolower($request->project_name)).'-'.date('is'),
                            'open_date' => Carbon::parse($request->open_date)->format('Y-m-d'),
                            'close_date' => Carbon::parse($request->close_date)->format('Y-m-d'),
                            'project_value' => $request->project_value,
                            'description' => $request->description,
                            'project_current_status' => $request->project_current_status,
                            'awarded_by' => $request->awarded_by,
                            'project_type_id' => $request->project_type_id,
                        ]);

            $this->addLog(auth()->id(),$project->id,0,$request->project_name.' has been created as A NEW Project by '.auth()->user()->name);
            
            DB::commit();
            return redirect()->route('projects.show', $project->id)->with('success', 'Updated Successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy(Request $request)
    {
        try {
            DB::beginTransaction();
            $project = Project::with(['project_plans'])->find($request->id);
            if ($project->project_plans()->count() > 0) {
                $this->addLog(auth()->id(),$project->id,0,auth()->user()->name.' has tried to DELETE the '.$project->project_name);
                DB::commit();
                return response()->json(['success' => true]);
            }
            $project->project_plans()->delete();
            $project->project_teams()->delete();
            $project->project_modules()->delete();
            $this->addLog(auth()->id(),$project->id,0,$project->project_name.' has been deleted by '.auth()->user()->name);
            $project->delete();
            DB::commit();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
