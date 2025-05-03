@extends('layouts.app')
@section('content')
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Leads</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Edit Client</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col col-lg-9 mx-auto">
        
        <h6 class="mb-0 text-uppercase">Update Client Information</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="border p-3 rounded">
                   <form class="row g-3" action="{{route('lead.update', $client->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label class="form-label" for="name">Full Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{$client->user->name}}">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{$client->user->email}}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="mobile">Mobile</label>
                            <input type="text" class="form-control" name="mobile" id="mobile" value="{{$client->user->mobile}}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="login_access">Login Access</label>
                            <select class="form-select single-select" id="login_access" name="login_access" required>
                                <option value="0" @selected($client->user->login_access == 0)>No Login</option>
                                <option value="1" @selected($client->user->login_access == 1)>Can Login</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="formFile">Avatar</label>
                            <input class="form-control" type="file" id="formFile" name="file" accept=".jpg, .png, image/jpeg, image/png">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="is_active">Status</label>
                            <select class="form-select single-select" id="is_active" name="is_active" required>
                                <option value="1" @selected($client->is_active == 1)>Active</option>
                                <option value="0" @selected($client->is_active == 0)>In Active</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Address</label>
                            <textarea class="form-control" type="text" id="address" name="address">{{$client->address}}</textarea>
                        </div>
                        <div class="col-md-12">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                   </form>
                </div>
             </div>
        </div>
    </div>
</div>
<!--end breadcrumb-->
@endsection
@push('scripts')

@endpush
