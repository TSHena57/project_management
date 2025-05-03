<div class="btn-group">
    <a href="{{route('lead.show', $row->id)}}" class="btn btn-sm btn-outline-info"><i class="lni lni-eye"></i></a>
    <a href="{{route('lead.edit', $row->id)}}" class="btn btn-sm btn-outline-warning"><i class="lni lni-pencil"></i></a>
    <button type="button" onclick="deleteData('Client', '{{ route('lead.delete') }}', {{ $row->id }})" class="btn btn-sm btn-outline-danger"><i class="lni lni-trash"></i></button>
</div>