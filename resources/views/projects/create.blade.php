@extends('layouts.app')
@push('styles')
    <style>
        textarea.form-control {
            min-height: calc(1.5em + 11.75rem + 2px);
        }
    </style>
@endpush
@section('content')
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Project</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">New Project</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col col-lg-10 mx-auto">
        
        <h6 class="mb-0 text-uppercase">New Project Information</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="border p-3 rounded">
                   <form class="row g-3" action="{{route('projects.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <label class="form-label" for="client_id">Client <span class="text-danger">*</span></label>
                            <select class="form-select server-side-select" id="client_id" name="client_id" required>
                                <option value="0">Select Client</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="project_type_id">Project Type <span class="text-danger">*</span></label>
                            <select class="form-select single-select" id="project_type_id" name="project_type_id" required>
                                @foreach ($types as $type)
                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="project_manager_id">Project Manager</label>
                            <select class="form-select server-side-select" id="project_manager_id" name="project_manager_id" required>
                                <option value="0">Select Project Manager</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="project_name">Project Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="project_name" id="project_name" value="" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="project_value">Project Value <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="project_value" id="project_value" step="0.01" value="0.00" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="project_current_status">Current Status</label>
                            <select class="form-select single-select" id="project_current_status" name="project_current_status" required>
                                <option value="Not Started" selected>Not Started</option>
                                <option value="On Hold">On Hold</option>
                                <option value="Planning">Planning</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Running">Running</option>
                                <option value="Completed">Completed</option>
                                <option value="Cancelled">Cancelled</option>
                                <option value="At Risk">At Risk</option>
                                <option value="Failed">Failed</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="awarded_by">Project Referred By</label>
                            <input type="text" class="form-control" name="awarded_by" id="awarded_by" value="">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="open_date">Open Date</label>
                            <input type="date" class="form-control" name="open_date" id="open_date" value="{{date('Y-m-d')}}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="close_date">Close Date (Est.)</label>
                            <input type="date" class="form-control" name="close_date" id="close_date" value="{{date('Y-m-d')}}">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" type="text" id="description" name="description"></textarea>
                        </div>
                        <div class="col-md-12">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Save</button>
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

<script>
    // (function($) {
    //     "use strict";
        $("#client_id").select2({
            ajax: {
                url: '{{route('lead.list_for_select_ajax')}}',
                type: "get",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                        var query = {
                            search: params.term,
                            page: params.page || 1,
                        }
                        return query;
                },
                cache: false
            }
        });
        $("#project_manager_id").select2({
            ajax: {
                url: '{{route('employee.list_for_select_ajax')}}',
                type: "get",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                        var query = {
                            search: params.term,
                            page: params.page || 1
                        }
                        return query;
                },
                cache: false
            },
            escapeMarkup: function (m) {
                return m;
            }
        });
    // });
</script>
@endpush
