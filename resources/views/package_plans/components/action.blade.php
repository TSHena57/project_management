<div class="btn-group">
    <a href="{{route('package_plans.edit', $row->id)}}" class="btn btn-sm btn-outline-warning"><i class="lni lni-pencil"></i></a>
    <button type="button" onclick="deleteData('Package Plan', '{{ route('package_plans.delete') }}', {{ $row->id }})" class="btn btn-sm btn-outline-danger"><i class="lni lni-trash"></i></button>
</div>