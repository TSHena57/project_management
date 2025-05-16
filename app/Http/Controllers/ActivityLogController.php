<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivityLog;
use DataTables;

class ActivityLogController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = ActivityLog::with(['user:id,name','project','project_module'])->latest();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){      
                        return view('project_activity_logs.components.action', compact('row'));
                    })
                    ->editColumn('created_at', function($row){
                        return $row->created_at ? date('d M Y h:i A',strtotime($row->created_at)) : 'n/a';
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            return view('project_activity_logs.index', $data);
        }
        return view('project_activity_logs.index');
    }
    
    public function destroy(Request $request)
    {
        try {
            $projectType = ActivityLog::find($request->id);
            $projectType->delete();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
