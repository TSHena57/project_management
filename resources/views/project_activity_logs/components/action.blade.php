<div class="btn-group">
    <button type="button" onclick="deleteData('Activity Log', '{{ route('project-activity-logs.delete') }}', {{ $row->id }})" class="btn btn-sm btn-outline-danger"><i class="lni lni-trash"></i></button>
</div>