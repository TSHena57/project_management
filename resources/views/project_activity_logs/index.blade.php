@extends('layouts.app')
@push('styles')    
@endpush
@section('content')
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Project Activity Logs</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Project Activity Logs List</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        
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
                                <th>Action User</th>
                                <th>Project</th>
                                <th>Project Module</th>
                                <th>IP</th>
                                <th>Subject</th>
                                <th>Date</th>
                                <th width="5%">Action</th>
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
                    ajax: "{{ route('project-activity-logs.index') }}",
                    pageLength: 50,
                    columns: [
                        {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                        {data: 'user.name', name: 'user.name'},
                        {data: 'project.project_name', name: 'project.project_name'},
                        {data: 'project_module.module_name', name: 'project_module.module_name'},
                        {data: 'ip', name: 'ip'},
                        {data: 'subject', name: 'subject'},
                        {data: 'created_at', name: 'created_at'},
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
