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
                <li class="breadcrumb-item active" aria-current="page">Client Information</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col col-lg-9 mx-auto">
        
        <h6 class="mb-0 text-uppercase">{{$client->user->name}} Details</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                
             </div>
        </div>
    </div>
</div>
<!--end breadcrumb-->
@endsection
