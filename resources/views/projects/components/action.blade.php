<div class="btn-group">
    <a href="{{route('projects.show', $row->id)}}" class="btn btn-sm btn-outline-info"><i class="lni lni-eye"></i></a>
    <a href="{{route('projects.edit', $row->id)}}" class="btn btn-sm btn-outline-warning"><i class="lni lni-pencil"></i></a>
    <button type="button" onclick="deleteData('Project', '{{ route('projects.delete') }}', {{ $row->id }})" class="btn btn-sm btn-outline-danger"><i class="lni lni-trash"></i></button>
</div>