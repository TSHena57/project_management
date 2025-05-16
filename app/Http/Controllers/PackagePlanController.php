<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PackagePlan;

class PackagePlanController extends Controller
{
    public function index(Request $request)
    {
        $data['plans'] = PackagePlan::all();
        return view('package_plans.index', $data);
    }

    public function create(Request $request)
    {
        return view('package_plans.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'is_active' => 'required|in:0,1',
            ]);
            $user = PackagePlan::create([
                                'name' => $request->name,
                                'package_plan_type' => $request->package_plan_type,
                                'slug' => str_replace(' ','-',strtolower($request->name)),
                                'price' => $request->price,
                                'description' => $request->description,
                                'max_employee_count' => $request->max_employee_count,
                                'max_project_count' => $request->max_project_count,
                                'project_activity_log_available' => $request->project_activity_log_available,
                                'gantt_chart_available' => $request->gantt_chart_available,
                                'client_login_available' => $request->client_login_available,
                                'report_available' => $request->report_available,
                                'is_active' => $request->is_active,
                            ]);
            
            return redirect()->route('package_plans.index')->with('success', 'Added Successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $data['plan'] = PackagePlan::find($id);
        return view('package_plans.edit', $data);
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'is_active' => 'required|in:0,1',
            ]);
            $designation = PackagePlan::find($id);
            $designation->update([
                            'name' => $request->name,
                            'package_plan_type' => $request->package_plan_type,
                            'slug' => str_replace(' ','-',strtolower($request->name)),
                            'price' => $request->price,
                            'description' => $request->description,
                            'max_employee_count' => $request->max_employee_count,
                            'max_project_count' => $request->max_project_count,
                            'project_activity_log_available' => $request->project_activity_log_available,
                            'gantt_chart_available' => $request->gantt_chart_available,
                            'client_login_available' => $request->client_login_available,
                            'report_available' => $request->report_available,
                        ]);
            
            return redirect()->route('package_plans.index')->with('success', 'Updated Successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
