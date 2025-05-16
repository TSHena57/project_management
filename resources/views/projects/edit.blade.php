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
                <li class="breadcrumb-item active" aria-current="page">Edit Project</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col col-lg-9 mx-auto">
        
        <h6 class="mb-0 text-uppercase">Update Project Information</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="border p-3 rounded">
                   <form class="row g-3" action="{{route('projects.update', $project->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <label class="form-label" for="client_id">Client</label>
                            <select class="form-select server-side-select" id="client_id" name="client_id" required>
                                @if ($project->client_id > 0)
                                    <option value="{{$project->client_id}}">{{$project->client->user->name}}</option>
                                @else
                                    <option value="0">Select Client</option>
                                @endif
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="project_type_id">Project Type</label>
                            <select class="form-select single-select" id="project_type_id" name="project_type_id" required>
                                @foreach ($types as $type)
                                    <option value="{{$type->id}}" @selected($type->id == $project->project_type_id)>{{$project->project_type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="project_manager_id">Project Manager</label>
                            <select class="form-select server-side-select" id="project_manager_id" name="project_manager_id" required>
                                @if ($project->project_manager_id > 0)
                                    <option value="{{$project->project_manager_id}}">{{$project->project_manager->user->name}}</option>
                                @else
                                    <option value="0">Select Project Manager</option>
                                @endif
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="project_name">Project Name</label>
                            <input type="text" class="form-control" name="project_name" id="project_name" value="{{$project->project_name}}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="project_value">Project Value</label>
                            <input type="number" class="form-control" name="project_value" id="project_value" step="0.01" value="{{$project->project_value}}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="project_current_status">Current Status</label>
                            <select class="form-select single-select" id="project_current_status" name="project_current_status" required>
                                <option value="Not Started" @selected($project->project_current_status == "Not Started")>Not Started</option>
                                <option value="On Hold" @selected($project->project_current_status == "On Hold")>On Hold</option>
                                <option value="Planning" @selected($project->project_current_status == "Planning")>Planning</option>
                                <option value="In Progress" @selected($project->project_current_status == "In Progress")>In Progress</option>
                                <option value="Running" @selected($project->project_current_status == "Running")>Running</option>
                                <option value="Completed" @selected($project->project_current_status == "Completed")>Completed</option>
                                <option value="Cancelled" @selected($project->project_current_status == "Cancelled")>Cancelled</option>
                                <option value="At Risk" @selected($project->project_current_status == "At Risk")>At Risk</option>
                                <option value="Failed" @selected($project->project_current_status == "Failed")>Failed</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="awarded_by">Project Referred By</label>
                            <input type="text" class="form-control" name="awarded_by" id="awarded_by" value="{{$project->awarded_by}}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="open_date">Open Date</label>
                            <input type="date" class="form-control" name="open_date" id="open_date" value="{{$project->open_date}}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="close_date">Close Date (Est.)</label>
                            <input type="date" class="form-control" name="close_date" id="close_date" value="{{$project->close_date ? $project->close_date : ''}}">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" type="text" id="description" name="description">{{$project->description}}</textarea>
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
