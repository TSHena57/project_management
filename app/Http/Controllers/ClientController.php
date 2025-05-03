<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\FileUploadTrait;
use Illuminate\Support\Facades\Hash;
use App\Models\Client;
use App\Models\User;
use DataTables;

class ClientController extends Controller
{
    use FileUploadTrait;

    public function active_client(Request $request)
    {
        if ($request->ajax()) {
            $data = Client::with(['user'])->where('is_active', 1);
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('is_active', function($row){
                        return '<span class="badge bg-success">Active</span>';
                    })
                    ->addColumn('action', function($row){      
                        return view('leads.components.action', compact('row'));
                    })
                    ->rawColumns(['is_active','action'])
                    ->make(true);
            return view('leads.active_clients', $data);
        }
        return view('leads.active_clients');
    }

    public function inactive_client(Request $request)
    {
        if ($request->ajax()) {
            $data = Client::with(['user'])->where('is_active', 0);
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('is_active', function($row){
                        return '<span class="badge bg-danger">InActive</span>';
                    })
                    ->addColumn('action', function($row){      
                        return view('leads.components.action', compact('row'));
                    })
                    ->rawColumns(['is_active','action'])
                    ->make(true);
            return view('leads.inactive_client', $data);
        }
        return view('leads.inactive_client');
    }

    public function create()
    {
        return view('leads.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|string|email',
                'mobile' => 'required|max:14',
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
                                'type' => 'client',
                                'mobile' => $request->mobile,
                                'password' => Hash::make('12345678'),
                                'login_access' => $request->login_access,
                                'avatar' => $avatar,
                            ]);
                    Client::create([
                        'user_id' => $user->id,
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
        $data['client'] = Client::with(['user'])->find($id);
        return view('leads.edit', $data);
    }

    public function show($id)
    {
        $data['client'] = Client::with(['user'])->find($id);
        return view('leads.show', $data);
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|string|email',
                'mobile' => 'required|max:14',
                'login_access' => 'required|in:0,1',
                'is_active' => 'required|in:0,1',
                'file' => 'nullable|file|mimes:jpg,png,jpeg|max:1000',
            ]);
            DB::beginTransaction();
            $client = Client::with(['user'])->find($id);
            $user = $client->user;
            if ($request->hasFile('file')) {
                $avatar = $this->uploadFile($request->file, 'user-profile-image');
            } else {
                $avatar = $user->avatar;
            }
            $user->update([
                            'name' => $request->name,
                            'email' => $request->email,
                            'mobile' => $request->mobile,
                            'login_access' => $request->login_access,
                            'avatar' => $avatar,
                        ]);
            $client->update([
                'address' => $request->address,
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
            $client = Client::with(['user'])->find($request->id);
            $client->user->delete();
            $client->delete();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
