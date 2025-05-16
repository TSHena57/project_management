@extends('layouts.app')
@section('content')
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Package Plan</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">New Package Plan</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col col-lg-9 mx-auto">
        
        <h6 class="mb-0 text-uppercase">New Package Plan Information</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="border p-3 rounded">
                   <form class="row g-3" action="{{route('package_plans.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <label class="form-label" for="name">Package Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" id="name" value="">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="package_plan_type">Plan Type <span class="text-danger">*</span></label>
                            <select class="form-select single-select" id="package_plan_type" name="package_plan_type" required>
                                <option value="Monthly" selected>Monthly</option>
                                <option value="Yearly">Yearly</option>
                                <option value="Custom">Custom</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="price">Package Price <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="price" id="price" value="0" step="0.01">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="is_active">Status</label>
                            <select class="form-select single-select" id="is_active" name="is_active" required>
                                <option value="1" selected>Active</option>
                                <option value="0">In Active</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="project_activity_log_available">Project Activity Log</label>
                            <select class="form-select single-select" id="project_activity_log_available" name="project_activity_log_available" required>
                                <option value="1" selected>Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="gantt_chart_available">Gantt Chart</label>
                            <select class="form-select single-select" id="gantt_chart_available" name="gantt_chart_available" required>
                                <option value="1" selected>Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="report_available">Report Section</label>
                            <select class="form-select single-select" id="report_available" name="report_available" required>
                                <option value="1" selected>Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="client_login_available">Client Login</label>
                            <select class="form-select single-select" id="client_login_available" name="client_login_available" required>
                                <option value="1" selected>Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="max_employee_count">Max Employee / User <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="max_employee_count" id="max_employee_count" value="0" step="0.01">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="max_project_count">Max Project <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="max_project_count" id="max_project_count" value="0" step="0.01">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" type="text" id="description" name="description"></textarea>
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
