<a href="{{ route('employees.edit', $id) }}" data-toggle="tooltip"  data-id="{{ $id }}" data-original-title="Edit" class="edit btn btn-success edit-user">
    Edit
</a>

<form method="post" action="{{ route('employees.destroy', $id) }}">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
</form>