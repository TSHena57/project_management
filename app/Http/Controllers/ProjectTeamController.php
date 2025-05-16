<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\ProjectLogActivity;
use App\Models\ProjectTeam;
use Carbon\Carbon;

class ProjectTeamController extends Controller
{
    use ProjectLogActivity;

    public function store(Request $request)
    {
        try {
            $request->validate([
                'project_id' => 'required|numeric|min:0',
                'project_id' => 'required|numeric|min:0',
                'join_date' => 'required',
            ]);
            DB::beginTransaction();
            $team = ProjectTeam::create([
                            'project_id' => $request->project_id,
                            'employee_id' => $request->employee_id,
                            'role_play' => $request->role_play,
                            'join_date' => Carbon::parse($request->join_date)->format('Y-m-d'),
                        ]);
            
            $this->addLog(auth()->id(),$request->project_id,0,$team->employee->user->name.' has been added by '.auth()->user()->name);
            
            DB::commit();
            return redirect()->back()->with('success', 'Added Successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    
    public function destroy(Request $request)
    {
        try {
            $team = ProjectTeam::find($request->id);
            DB::beginTransaction();
            
            $this->addLog(auth()->id(),$team->project_id,0,$team->employee->user->name.' has been removed by '.auth()->user()->name);
            $team->delete();
            
            DB::commit();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
