<div class="modal fade show" id="exampleLargeModal" tabindex="-1" style="display: block;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
       <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title">Edit Information</h5>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form class="row g-3" action="{{route('phase.update', $phase->id)}}" method="POST">
                @csrf
                <div class="col-12">
                    <label class="form-label" for="name">Project Phase</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$phase->name}}">
                </div>
                <div class="col-12">
                    <label class="form-label" for="is_active">Status</label>
                    <select class="form-select single-select" id="is_active" name="is_active" required>
                        <option value="1" @selected($phase->is_active == 1)>Active</option>
                        <option value="0" @selected($phase->is_active == 0)>In Active</option>
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