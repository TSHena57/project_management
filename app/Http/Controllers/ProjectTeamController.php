<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectTeam;
use Carbon\Carbon;

class ProjectTeamController extends Controller
{
    public function store(Request $request)
    {
        try {
            $request->validate([
                'project_id' => 'required|numeric|min:0',
                'project_id' => 'required|numeric|min:0',
                'join_date' => 'required',
            ]);
            ProjectTeam::create([
                            'project_id' => $request->project_id,
                            'employee_id' => $request->employee_id,
                            'role_play' => $request->role_play,
                            'join_date' => Carbon::parse($request->join_date)->format('Y-m-d'),
                        ]);
            
            return redirect()->back()->with('success', 'Added Successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    
    public function destroy(Request $request)
    {
        try {
            $projectType = ProjectTeam::find($request->id);
            $projectType->delete();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
