<aside class="sidebar-wrapper">
    <div class="iconmenu">
       <div class="nav-toggle-box">
          <div class="nav-toggle-icon"><i class="bi bi-list"></i></div>
       </div>
       <ul class="nav nav-pills flex-column">
            @if (auth()->user()->type == "system_owner")
               <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="SYSTEM ADMIN MENUS">
                  <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-system-admin-menus" type="button"><i class="lni lni-network"></i></button>
               </li>
            @endif
            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboards">
               <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-dashboards" type="button"><i class="bi bi-house-door-fill"></i></button>
            </li>
            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Board Manage">
               <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-task" type="button"><i class="lni lni-layers"></i></button>
            </li>
            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Leads">
               <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-leads" type="button"><i class="lni lni-users"></i></button>
            </li>
            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Human Resource">
               <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-hr" type="button"><i class="lni lni-users"></i></button>
            </li>
            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Projects">
               <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-projects" type="button"><i class="lni lni-agenda"></i></button>
            </li>
       </ul>
    </div>
    <div class="textmenu">
      <div class="brand-logo">
         <img src="{{asset('images/brand-logo-2.png')}}" width="140" alt=""/>
      </div>
      <div class="tab-content">
            @if (auth()->user()->type == "system_owner")
               <div class="tab-pane fade active show" id="pills-system-admin-menus">
                  <div class="list-group list-group-flush">
                     <a href="javascript:;" class="list-group-item"><i class="bi bi-house-door-fill"></i>Dashboard</a>
                     <a href="javascript:;" class="list-group-item"><i class="lni lni-restaurant"></i>Company</a>
                     <a href="{{route('package_plans.index')}}" class="list-group-item"><i class="lni lni-grid"></i>Packages</a>
                  </div>
               </div>
            @endif
            {{-- @if (auth()->user()->type != "system_owner") --}}
            <div class="tab-pane fade" id="pills-dashboards">
               <div class="list-group list-group-flush">
                  <div class="list-group-item">
                     <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-0">Dashboards</h5>
                     </div>
                  </div>
                  <a href="{{route('dashboard')}}" class="list-group-item"><i class="lni lni-arrow-right"></i>Summary</a>
                  <a href="{{route('project-activity-logs.index')}}" class="list-group-item"><i class="lni lni-arrow-right"></i>Project Logs</a>
               </div>
            </div>
            <div class="tab-pane fade" id="pills-task">
               <div class="list-group list-group-flush">
                  <div class="list-group-item">
                     <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-0">Board</h5>
                     </div>
                  </div>
                  <a href="{{route('my_board')}}" class="list-group-item"><i class="lni lni-arrow-right"></i>My Board</a>
               </div>
            </div>
            <div class="tab-pane fade {{Route::is('lead.*')  ? 'active show' : ''}}" id="pills-leads">
               <div class="list-group list-group-flush">
                  <div class="list-group-item">
                     <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-0">Leads</h5>
                     </div>
                  </div>
                  <a href="{{route('lead.client_create')}}" class="list-group-item"><i class="lni lni-arrow-right"></i>Create Client</a>
                  <a href="{{route('lead.active_client')}}" class="list-group-item"><i class="lni lni-arrow-right"></i>Active Client</a>
                  <a href="{{route('lead.inactive_client')}}" class="list-group-item"><i class="lni lni-arrow-right"></i>In-Active Client</a>
               </div>
            </div>
            <div class="tab-pane fade {{Route::is('employee.*')  ? 'active show' : ''}}" id="pills-hr">
               <div class="list-group list-group-flush">
                  <div class="list-group-item">
                     <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-0">Human Resource</h5>
                     </div>
                  </div>
                  <a href="{{route('employee.create')}}" class="list-group-item"><i class="lni lni-arrow-right"></i>Create Employee</a>
                  <a href="{{route('employee.index')}}" class="list-group-item"><i class="lni lni-arrow-right"></i>Employee</a>
                  <a href="{{route('designation.index')}}" class="list-group-item"><i class="lni lni-arrow-right"></i>Designation</a>
                  <a href="{{route('department.index')}}" class="list-group-item"><i class="lni lni-arrow-right"></i>Department</a>
               </div>
            </div>
            <div class="tab-pane fade {{Route::is('projects.*') || Route::is('type.*') || Route::is('phase.*')  ? 'active show' : ''}}" id="pills-projects">
               <div class="list-group list-group-flush">
                  <div class="list-group-item">
                     <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-0">Projects</h5>
                     </div>
                  </div>
                  <a href="{{route('projects.create')}}" class="list-group-item"><i class="lni lni-arrow-right"></i>New Projects</a>
                  <a href="{{route('projects.index')}}" class="list-group-item"><i class="lni lni-arrow-right"></i>Projects</a>
                  <a href="{{route('type.index')}}" class="list-group-item"><i class="lni lni-arrow-right"></i>Type</a>
                  <a href="{{route('phase.index')}}" class="list-group-item"><i class="lni lni-arrow-right"></i>Phase</a>
               </div>
            </div>
            {{-- @endif --}}
      </div>
    </div>
 </aside>