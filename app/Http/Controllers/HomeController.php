<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function welcome()
    {
        return redirect()->route('dashboard');
        // return view('welcome');
    }

    public function dashboard()
    {
        $data['total_project_count'] = Project::count();
        $data['total_completed_project_count'] = Project::where('project_current_status', 'Completed')->count();
        $data['total_failed_project_count'] = Project::where('project_current_status', 'Failed')->count();
        $data['total_cancelled_project_count'] = Project::where('project_current_status', 'Cancelled')->count();
        $data['total_risk_project_count'] = Project::where('project_current_status', 'At Risk')->count();
        $data['total_running_project_count'] = Project::whereIn('project_current_status', ['Planning','In Progress','Running'])->count();
        return view('home', $data);
    }
}
