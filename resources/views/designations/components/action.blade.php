<div class="btn-group">
    <button type="button" class="btn btn-sm btn-outline-warning detail_info" data-route="{{route('designation.edit', $row->id)}}"><i class="lni lni-pencil"></i></button>
    <button type="button" onclick="deleteData('Designation', '{{ route('designation.delete') }}', {{ $row->id }})" class="btn btn-sm btn-outline-danger"><i class="lni lni-trash"></i></button>
</div>