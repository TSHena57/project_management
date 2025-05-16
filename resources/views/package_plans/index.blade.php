@extends('layouts.app')
@push('styles')    
@endpush
@section('content')
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Package Plan</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Package Plan List</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <a href="{{ route('package_plans.create') }}" class="btn btn-sm btn-success px-5 rounded-0"><i class="lni lni-plus"></i> New Package Plan</a>
    </div>
</div>
<div class="row">
    @foreach ($plans as $plan)
        <div class="col col-lg-3">                
            <div class="card rounded-0">
                <div class="card-body">
                    <div class="text-center">
                        <h5 class="mb-4">{{$plan->name}}</h5>
                        <h1 class="card-price">
                            <span class="fs-6 text-secondary">TK</span>
                            {{number_format($plan->price,2)}}
                            <span class="fs-6 text-secondary">/ {{$plan->package_plan_type}}
                            </span>
                        </h1>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><i class="bi bi-check-circle me-2"></i>{{$plan->max_employee_count}} Max Employee / User</li>
                        <li class="list-group-item"><i class="bi bi-check-circle me-2"></i>{{$plan->max_project_count}} Max Project</li>
                        <li class="list-group-item"><i class="{{$plan->client_login_available == 0 ? 'bi bi-x-circle me-2 text-danger' : 'bi bi-check-circle me-2'}}"></i>Client Login</li>
                        <li class="list-group-item"><i class="{{$plan->project_activity_log_available == 0 ? 'bi bi-x-circle me-2 text-danger' : 'bi bi-check-circle me-2'}}"></i>Project Activity Log</li>
                        <li class="list-group-item"><i class="{{$plan->gantt_chart_available == 0 ? 'bi bi-x-circle me-2 text-danger' : 'bi bi-check-circle me-2'}}"></i>Gantt Chart</li>
                        <li class="list-group-item"><i class="{{$plan->report_available == 0 ? 'bi bi-x-circle me-2 text-danger' : 'bi bi-check-circle me-2'}}"></i>Report Section</li>
                    </ul>
                    <div class="text-center mt-3 d-grid d-lg-block">
                        <a href="{{route('package_plans.edit', $plan->id)}}" class="btn btn-outline-primary rounded-0 px-4 shadow">EDIT NOW</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
<!--end breadcrumb-->
@endsection