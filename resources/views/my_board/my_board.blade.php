@extends('layouts.app')
@push('styles')
<style>
    .kanban-column {
      min-height: 500px;
      background-color: #c6eef1;
      padding: 10px;
      border-radius: 5px;
    }
    .kanban-card {
      margin-bottom: 10px;
      cursor: grab;
    }
    .kanban-header {
      font-weight: bold;
      margin-bottom: 15px;
    }
  </style>
@endpush
@section('content')
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Board</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">My Board</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        {{-- Place Button --}}
    </div>
</div>
<div class="row text-center">
    <div class="col-md-4">
      <div class="kanban-column">
        <div class="kanban-header text-primary">To Do</div>
        <div class="card kanban-card">
          <div class="card-body">Design homepage layout</div>
        </div>
        <div class="card kanban-card">
          <div class="card-body">Create database schema</div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="kanban-column">
        <div class="kanban-header text-danger">In Progress</div>
        <div class="card kanban-card">
          <div class="card-body">Build login feature</div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="kanban-column">
        <div class="kanban-header text-success">Done</div>
        <div class="card kanban-card">
          <div class="card-body">Project setup</div>
        </div>
      </div>
    </div>
  </div>
@endsection