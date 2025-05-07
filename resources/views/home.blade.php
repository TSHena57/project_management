@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card radius-10">
                <div class="card-body text-center">
                   <div class="widget-icon mx-auto mb-3 bg-light-primary text-primary">
                      <i class="bi bi-chat-left-fill"></i>
                   </div>
                   <p class="mb-0">Total Project</p>
                   <h3 class="mt-4 mb-0">{{$total_project_count}}</h3>
                </div>
             </div>
        </div>
        <div class="col-md-4">
            <div class="card radius-10">
                <div class="card-body text-center">
                   <div class="widget-icon mx-auto mb-3 bg-light-success text-success">
                      <i class="bi bi-chat-left-fill"></i>
                   </div>
                   <p class="mb-0">Total Completed Project</p>
                   <h3 class="mt-4 mb-0">{{$total_completed_project_count}}</h3>
                </div>
             </div>
        </div>
        <div class="col-md-4">
            <div class="card radius-10">
                <div class="card-body text-center">
                   <div class="widget-icon mx-auto mb-3 bg-light-warning text-warning">
                      <i class="bi bi-chat-left-fill"></i>
                   </div>
                   <p class="mb-0">Total Running Project</p>
                   <h3 class="mt-4 mb-0">{{$total_running_project_count}}</h3>
                </div>
             </div>
        </div>
        <div class="col-md-4">
            <div class="card radius-10">
                <div class="card-body text-center">
                   <div class="widget-icon mx-auto mb-3 bg-light-danger text-danger">
                      <i class="bi bi-chat-left-fill"></i>
                   </div>
                   <p class="mb-0">Total Failed Project</p>
                   <h3 class="mt-4 mb-0">{{$total_failed_project_count}}</h3>
                </div>
             </div>
        </div>
        <div class="col-md-4">
            <div class="card radius-10">
                <div class="card-body text-center">
                   <div class="widget-icon mx-auto mb-3 bg-light-warning text-warning">
                      <i class="bi bi-chat-left-fill"></i>
                   </div>
                   <p class="mb-0">Total Cancelled Project</p>
                   <h3 class="mt-4 mb-0">{{$total_running_project_count}}</h3>
                </div>
             </div>
        </div>
        <div class="col-md-4">
            <div class="card radius-10">
                <div class="card-body text-center">
                   <div class="widget-icon mx-auto mb-3 bg-light-danger text-danger">
                      <i class="bi bi-chat-left-fill"></i>
                   </div>
                   <p class="mb-0">At Risk Project</p>
                   <h3 class="mt-4 mb-0">{{$total_risk_project_count}}</h3>
                </div>
             </div>
        </div>
    </div>
</div>
@endsection
