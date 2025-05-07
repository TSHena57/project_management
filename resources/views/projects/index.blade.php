@extends('layouts.app')
@push('styles')    
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
                <li class="breadcrumb-item active" aria-current="page">Project List</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <a href="{{ route('projects.create') }}" class="btn btn-sm btn-success px-5 rounded-0"><i class="lni lni-plus"></i> New Project</a>
    </div>
</div>
<div class="row">
    <div class="col col-lg-12 mx-auto">                
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th width="4%">#</th>
                                <th>Client</th>
                                <th>Project</th>
                                <th>Project Manager</th>
                                <th>Open Date</th>
                                <th>Close Date</th>
                                <th>Valuation</th>
                                <th>Status</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end breadcrumb-->
@endsection

@push('scripts')
    <script>
        (function($) {
            "use strict";
            APP_TOKEN;
            $(document).ready(function(){
                var table = $('#dataTable').DataTable( {
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('projects.index') }}",
                    columns: [
                        {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                        {data: 'client.user.name', name: 'client.user.name'},
                        {data: 'project_name', name: 'project_name'},
                        {data: 'project_manager.user.name', name: 'project_manager.user.name'},
                        {data: 'open_date', name: 'open_date'},
                        {data: 'close_date', name: 'close_date'},
                        {data: 'project_value', name: 'project_value'},
                        {data: 'project_current_status', name: 'project_current_status'},
                        {data: 'action', name: 'action', orderable: false, searchable: false, printable:false},
                    ],
                    responsive: false,
                    lengthChange: true,
                } );
                $.fn.dataTable.ext.errMode = () => alert('Error while loading the table data. Please refresh');
            });
        })(jQuery);
    </script>
@endpush
