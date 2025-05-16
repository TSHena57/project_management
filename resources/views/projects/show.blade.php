@extends('layouts.app')
@push('styles')
    <style>
        .select2-container--open {
            z-index: 9999 !important; /* Higher than Bootstrap modal (usually 1050) */
        }
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
                <li class="breadcrumb-item active" aria-current="page">Project Details Information</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row mb-4">
    <div class="col-md-6">  
        <div class="border p-3 rounded">
            <h6 class="mb-0 text-uppercase">{{$project->project_name}} Information</h6>
            <hr/>
            <table class="table table-bordered mb-0">
                <tbody>
                    <tr>
                        <td width="30%">Project Value</td>
                        <td width="70%">{{currencySymbol($project->project_value)}}</td>
                    </tr>
                    <tr>
                        <td width="30%">Project Type</td>
                        <td width="70%">{{$project->project_type->name}}</td>
                    </tr>
                    <tr>
                        <td width="30%">Client</td>
                        <td width="70%">{{$project->client->user->name}}</td>
                    </tr>
                    <tr>
                        <td width="30%">Project Referred By</td>
                        <td width="70%">{{$project->awarded_by}}</td>
                    </tr>
                    <tr>
                        <td width="30%">Project Manager</td>
                        <td width="70%">{{$project->project_manager->user->name}}</td>
                    </tr>
                    <tr>
                        <td width="30%">Open Date</td>
                        <td width="70%">{{date('d M, Y',strtotime($project->open_date))}}</td>
                    </tr>
                    <tr>
                        <td width="30%">Close Date</td>
                        <td width="70%">{{date('d M, Y',strtotime($project->close_date))}}</td>
                    </tr>
                    <tr>
                        <td width="30%">Project Details</td>
                        <td width="70%">{{$project->description}}</td>
                    </tr>
                    <tr>
                        <td width="30%">Current Status</td>
                        <td width="70%">{{$project->project_current_status}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-6">
        <h6 class="mb-0 text-uppercase">Module Manage</h6>
        <hr/>
        <div class="border p-3 rounded">
            <form class="row g-3" action="{{route('modules.store')}}" method="POST">
                @csrf
                <div class="col-md-12">
                    <label class="form-label" for="project_phase_id">Project Phase</label>
                    <select class="form-select server-side-select project_phase_id" name="project_phase_id" required>
                        <option value="0">Select Phase</option>
                    </select>
                </div>
                <input type="hidden" name="project_id" value="{{$project->id}}">
                <div class="col-md-12">
                    <label class="form-label" for="module_name">Module Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="module_name" value="" required>
                </div>
                <div class="col-md-12">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" type="text" name="description"></textarea>
                </div>
                <div class="col-12">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Add Module</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row mb-4">
    <div class="col-md-4">
        <h6 class="mb-0 text-uppercase">Team Information</h6>
        <hr/>
        <div class="border p-3 rounded">
            <form class="row g-3" action="{{route('project_team.store')}}" method="POST">
                @csrf
                <div class="col-12">
                    <input type="hidden" name="project_id" value="{{$project->id}}">
                    <label class="form-label" for="employee_id">Project Team Member <span class="text-danger">*</span></label>
                    <select class="form-select server-side-select employee_id" id="employee_id" name="employee_id" required>
                        <option value="0">Select Member</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="join_date">Team Joining Date <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" name="join_date" id="join_date" value="{{date('Y-m-d')}}">
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="role_play">Role Play As <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="role_play" id="role_play" value="" required>
                </div>
                <div class="col-12">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Add Member</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-8">
        <h6 class="mb-0 text-uppercase">Team Members</h6>
        <hr/>
        <div class="border p-3 rounded">
            <table class="table table-bordered mb-0">
                <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th>Name</th>
                        <th>Role Play</th>
                        <th>Joined Team</th>
                        <th width="5%">Remove</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($project->project_teams as $k => $team)
                        <tr>
                            <td>{{$k+1}}</td>
                            <td>
                                <div class="chip">
                                    <img src="{{showDefaultImage('storage/'.$team->employee->user->avatar)}}" alt="{{ $team->employee->user->name }}">
                                    {{$team->employee->user->name}}
                                </div>
                                </td>
                            <td>{{$team->role_play}}</td>
                            <td>{{date('d M, Y',strtotime($team->join_date))}}</td>
                            <td>
                                <button type="button" onclick="deleteData('From Team', '{{ route('project_team.remove') }}', {{ $team->id }})" class="btn btn-sm btn-outline-danger"><i class="lni lni-close"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
         </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <h6 class="mb-0 text-uppercase">Project Phase Module Details</h6>
        <hr/>
        <div class="border p-3 rounded">
            <table class="table table-bordered">
                @foreach($module_phases as $phase_name => $modules)
                    <thead>
                        <tr>
                            <th colspan="6">{{ $phase_name }}</th>
                        </tr>  
                    </thead>          
                    @foreach($modules as $k => $module)
                        <thead>
                            <tr>
                                <th style="padding-left: 20px; vertical-align: middle;">
                                    <button type="button" class="btn btn-sm btn-outline-warning module_info" data-route="{{route('modules.edit', $module->id)}}">Module {{$k+1}}: {{ $module->module_name }}  <i class="lni lni-pencil"></i></button>
                                </th>
                                <th colspan="6" width="70%" style="text-align: justify;">
                                    {{ $module->description }}
                                </th>
                            </tr>
                
                            <tr>
                                <th style="padding-left: 40px;">Task Name</th>
                                <th>Assigned To</th>
                                <th>Added By</th>
                                <th>Priority</th>
                                <th>Duration</th>
                                <th width="10%">Status</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
            
                        <tbody>
                            @forelse($module->project_plans as $task)
                                <tr>
                                    <td>{{ $task->task_name }}</td>
                                    <td>
                                        @if ($task->employee_id > 0)
                                            <div class="chip">
                                                <img src="{{showDefaultImage('storage/'.$task->employee->user->avatar)}}" alt="{{ $task->employee->user->name }}">
                                                {{ $task->employee->user->name }}
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="chip">
                                            <img src="{{showDefaultImage('storage/'.$task->creator->avatar)}}" alt="{{ $task->creator->name }}">
                                            {{ $task->creator->name }}
                                        </div>
                                    </td>
                                    <td>
                                        @if ($task->priority == 1)
                                            <span class="badge bg-primary">LOW</span>
                                        @elseif($task->priority == 2)
                                            <span class="badge bg-warning">MEDIUM</span>
                                        @else
                                            <span class="badge bg-error">TOP</span>
                                        @endif
                                    </td>
                                    <td><span class="badge bg-primary">{{ $task->task_duration_hrs }} Hrs</span></td>
                                    <td>{{ $task->current_status }}</td>
                                    <td>
                                         <button type="button" class="btn btn-sm btn-outline-warning detail_info" data-route="{{route('project_plan.edit', $task->id)}}"><i class="lni lni-pencil"></i></button>
                                        <button type="button" onclick="deleteData('Task', '{{ route('project_plan.remove') }}', {{ $task->id }})" class="btn btn-sm btn-outline-danger"><i class="lni lni-trash"></i></button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No tasks found under this module.</td>
                                </tr>
                            @endforelse
                            <tr>
                                <td colspan="7" class="text-end">
                                    <div class="accordion" id="module{{$module->id}}">
                                        <div class="accordion-item">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button class="btn btn-sm btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#moduleSection{{$module->id}}" aria-expanded="true" aria-controls="moduleSection{{$module->id}}">
                                                        <i class="lni lni-plus"></i> Add New Task for {{ $module->module_name }}
                                                    </button>
                                                </div>
                                            </div>
                                            <div id="moduleSection{{$module->id}}" class="accordion-collapse collapse" aria-labelledby="heading{{$module->id}}" data-bs-parent="#module{{$module->id}}" style="">
                                                <div class="accordion-body">
                                                    <form class="row g-3" action="{{route('project_plan.store')}}" method="POST">
                                                        @csrf
                                                        <div class="col-md-4">
                                                            <input type="hidden" name="project_id" value="{{$project->id}}">
                                                            <input type="hidden" name="project_phase_id" value="{{$module->project_phase_id}}">
                                                            <input type="hidden" name="project_module_id" value="{{$module->id}}">
                                                            <label class="form-label" for="employee_id">Team Member <span class="text-danger">*</span></label>
                                                            <select class="form-select server-side-select employee_id" name="employee_id" required>
                                                                <option value="0">Select Member</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="form-label" for="task_name">Task Name <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="task_name" value="" required>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="form-label" for="task_duration_hrs">Task Duration <span class="text-danger">(in Hours)</span></label>
                                                            <input type="number" min="0" step="0.1" class="form-control" name="task_duration_hrs" value="0" required>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="form-label" for="current_status">Current Status</label>
                                                            <select class="form-select single-select" id="current_status" name="current_status" required>
                                                                <option value="On Hold" selected>On Hold</option>
                                                                <option value="To Do">To Do</option>
                                                                <option value="In Progress">In Progress</option>
                                                                <option value="Testing">Testing</option>
                                                                <option value="Completed">Completed</option>
                                                                <option value="Error Solving">Error Solving</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="form-label" for="priority">Task Priority <span class="text-danger">*</span></label>
                                                            <select class="form-select single-select" name="priority" required>
                                                                <option value="1" selected>Low</option>
                                                                <option value="2">Medium</option>
                                                                <option value="3">Top</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="form-label" for="start_date">Start Date</label>
                                                            <input type="date" class="form-control" name="start_date" value="{{date('Y-m-d')}}">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="form-label" for="end_date">End Date</label>
                                                            <input type="date" class="form-control" name="end_date" value="{{date('Y-m-d')}}">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <label class="form-label">Description</label>
                                                            <textarea class="form-control" type="text" name="task_details"></textarea>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="d-grid">
                                                                <button type="submit" class="btn btn-primary">Add Task</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr
                        </tbody>
                    @endforeach
                @endforeach
            <table>            
         </div>
    </div>
</div>
<div id="ajaxDiv"></div>
<!--end breadcrumb-->
@endsection
@push('scripts')

<script>
    // (function($) {
    //     "use strict";
        $(document).ready(function() {
            getPhase();
            getEmployee()
        });
        $(document).on('click','.detail_info', function(){
            $('.detail_info').addClass('disabled');
            var url = $(this).attr("data-route");
            $.ajax({
                url: url,
                type: "GET",
                dataType: "HTML",
                success: function (response) {
                    $('#ajaxDiv').html(response);
                    $('#exampleLargeModal').modal('show');
                    $('.detail_info').removeClass('disabled');
                    getEmployee();
                },
                error: function (error) {
                    $('.detail_info').removeClass('disabled');
                }
            });
        });
        $(document).on('click','.module_info', function(){
            $('.module_info').addClass('disabled');
            var url = $(this).attr("data-route");
            $.ajax({
                url: url,
                type: "GET",
                dataType: "HTML",
                success: function (response) {
                    $('#ajaxDiv').html(response);
                    $('#exampleLargeModal').modal('show');
                    getPhase();
                    $('.module_info').removeClass('disabled');
                },
                error: function (error) {
                    $('.module_info').removeClass('disabled');
                }
            });
        });
    // });
        
    function getEmployee(){
        $(".employee_id").select2({
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
    }
    function getPhase(){
        $(".project_phase_id").select2({
            ajax: {
                url: '{{route('phase.list_for_select_ajax')}}',
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
            },
            // dropdownParent: $('.modal')
        });
    }
</script>
@endpush

