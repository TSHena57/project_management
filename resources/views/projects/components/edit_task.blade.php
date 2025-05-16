<div class="modal fade show" id="exampleLargeModal" tabindex="-1" style="display: block;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
       <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title">Edit Information</h5>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form class="row g-3" action="{{route('project_plan.update', $plan->id)}}" method="POST">
                @csrf
                <div class="col-md-4">
                    <label class="form-label" for="employee_id">Team Member <span class="text-danger">*</span></label>
                    <select class="form-select server-side-select employee_id" name="employee_id" required>
                        @if ($plan->employee_id > 0)
                            <option value="{{$plan->employee_id}}">{{$plan->employee->user->name}}</option>
                        @else
                            <option value="0">Select Member</option>
                        @endif
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="task_name">Task Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="task_name" value="{{$plan->task_name}}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="task_duration_hrs">Task Duration <span class="text-danger">(in Hours)</span></label>
                    <input type="number" min="0" step="0.1" class="form-control" name="task_duration_hrs" value="{{$plan->task_duration_hrs}}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="priority">Task Priority <span class="text-danger">*</span></label>
                    <select class="form-select single-select" id="priority" name="priority" required>
                        <option value="1" @selected($plan->priority == 1)>Low</option>
                        <option value="2" @selected($plan->priority == 2)>Medium</option>
                        <option value="3" @selected($plan->priority == 3)>Top</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="start_date">Start Date</label>
                    <input type="date" class="form-control" name="start_date" id="start_date" value="{{$plan->start_date}}">
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="end_date">End Date</label>
                    <input type="date" class="form-control" name="end_date" id="end_date" value="{{$plan->end_date}}">
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="current_status">Current Status</label>
                    <select class="form-select single-select" id="current_status" name="current_status" required>
                        <option value="On Hold" @selected($plan->current_status == "On Hold")>On Hold</option>
                        <option value="To Do" @selected($plan->current_status == "To Do")>To Do</option>
                        <option value="In Progress" @selected($plan->current_status == "In Progress")>In Progress</option>
                        <option value="Testing" @selected($plan->current_status == "Testing")>Testing</option>
                        <option value="Completed" @selected($plan->current_status == "Completed")>Completed</option>
                        <option value="Error Solving" @selected($plan->current_status == "Error Solving")>Error Solving</option>
                    </select>
                </div>
                <div class="col-md-8">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" type="text" name="task_details">{{$plan->task_details}}</textarea>
                </div>
                <div class="col-12">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
           </form>
          </div>
       </div>
    </div>
 </div>