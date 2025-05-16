<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\FileUploadTrait;
use Illuminate\Support\Facades\Hash;
use App\Models\Employee;
use App\Models\Designation;
use App\Models\Department;
use App\Models\User;
use DataTables;

class EmployeeController extends Controller
{
    use FileUploadTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Employee::with(['user','designation:id,name','department:id,name']);
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
                        return view('employee.components.action', compact('row'));
                    })
                    ->rawColumns(['is_active','action'])
                    ->make(true);
            return view('employee.index', $data);
        }
        return view('employee.index');
    }

    public function list_for_select_ajax(Request $request)
    {
        $items = Employee::query();
        $items = $items->with(['user:id,name'])->where('is_active', 1);

        if ($request->search != '') {
            $items = $items->whereLike(['user.name'], $request->search);
        }

        // Paginate the results
        $items = $items->paginate(10);
        $response = [];
        foreach ($items as $item) {
            $response[] = [
                'id'    => $item->id,
                'text'  => $item->user->name,
            ];
        }

        $data['results'] = $response;
        if ($items->hasMorePages()) {
            $data['pagination'] = ['more' => true];
        }

        return response()->json($data);
    }

    public function create()
    {
        $data['designations'] = Designation::where('is_active', 1)->get(['id','name']);
        $data['departments'] = Department::where('is_active', 1)->get(['id','name']);
        return view('employee.create',$data);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|string|email',
                'password' => 'required|string',
                'designation_id' => 'required|numeric|gt:0',
                'department_id' => 'required|numeric|gt:0',
                'mobile' => 'nullable|max:14',
                'login_access' => 'required|in:0,1',
                'is_active' => 'required|in:0,1',
                'file' => 'nullable|file|mimes:jpg,png,jpeg|max:1000',
            ]);
            DB::beginTransaction();
            if ($request->hasFile('file')) {
                $avatar = $this->uploadFile($request->file, 'user-profile-image');
            } else {
                $avatar = null;
            }
            $user = User::create([
                                'name' => $request->name,
                                'email' => $request->email,
                                'type' => 'organization',
                                'mobile' => $request->mobile,
                                'password' => Hash::make($request->password),
                                'login_access' => $request->login_access,
                                'avatar' => $avatar,
                            ]);
                    Employee::create([
                        'user_id' => $user->id,
                        'designation_id' => $request->designation_id,
                        'department_id' => $request->department_id,
                        'employee_id' => $request->employee_id,
                        'address' => $request->address,
                        'is_active' => $request->is_active,
                    ]);
            DB::commit();
            
            return redirect()->back()->with('success', 'Added Successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $data['employee'] = Employee::with(['user'])->find($id);
        $data['designations'] = Designation::where('is_active', 1)->get(['id','name']);
        $data['departments'] = Department::where('is_active', 1)->get(['id','name']);
        return view('employee.edit', $data);
    }

    public function show($id)
    {
        $data['employee'] = Employee::with(['user'])->find($id);
        return view('employee.show', $data);
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|string|email',
                'mobile' => 'nullable|max:14',
                'login_access' => 'required|in:0,1',
                'is_active' => 'required|in:0,1',
                'file' => 'nullable|file|mimes:jpg,png,jpeg|max:1000',
            ]);
            DB::beginTransaction();
            $employee = Employee::with(['user'])->find($id);
            $user = $employee->user;
            if ($request->hasFile('file')) {
                $avatar = $this->uploadFile($request->file, 'user-profile-image');
            } else {
                $avatar = $user->avatar;
            }
            $user->update([
                            'name' => $request->name,
                            'email' => $request->email,
                            'mobile' => $request->mobile,
                            'password' => Hash::make($request->password),
                            'login_access' => $request->login_access,
                            'avatar' => $avatar,
                        ]);
            $employee->update([
                'address' => $request->address,
                'designation_id' => $request->designation_id,
                'department_id' => $request->department_id,
                'employee_id' => $request->employee_id,
                'is_active' => $request->is_active,
            ]);
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
            $employee = Employee::with(['user'])->find($request->id);
            $employee->user->delete();
            $employee->delete();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
