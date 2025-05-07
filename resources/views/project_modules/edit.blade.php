<div class="modal fade show" id="exampleLargeModal" tabindex="-1" style="display: block;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
       <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title">Edit Information</h5>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form class="row g-3" action="{{route('modules.update', $module->id)}}" method="POST">
                @csrf
                <div class="col-md-12">
                    <label class="form-label" for="project_phase_id">Project Phase</label>
                    <select class="form-select server-side-select project_phase_id" name="project_phase_id" required>
                        <option value="{{$module->project_phase_id}}">{{$module->project_phase->name}}</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="module_name">Module Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="module_name" id="module_name" value="{{$module->module_name}}" required>
                </div>
                <div class="col-md-12">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" type="text" id="description" name="description">{{$module->description}}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label" for="is_active">Status</label>
                    <select class="form-select single-select" id="is_active" name="is_active" required>
                        <option value="1" @selected($module->is_active == 1)>Active</option>
                        <option value="0" @selected($module->is_active == 0)>In Active</option>
                    </select>
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