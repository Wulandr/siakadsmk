<a href="<?= route('roles.edit', ['role' => base64_encode($id)]) ?>" data-toggle="tooltip" data-id="{{ $id }}" data-original-title="Edit" class="edit btn btn-success edit">
    Edit
</a>
<!-- <a href="{{route('roles.destroy',['role' => base64_encode($id)])}}" id="delete-book" data-toggle="tooltip" data-original-title="Delete" data-id="{{ $id }}" class="delete btn btn-danger">
    Delete
</a> -->
<form action="{{route('roles.destroy',['role' => base64_encode($id)])}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-action btn-sm mr-1 trigger--fire-modal-1" data-toggle="tooltip" title="" onclick="return confirm('Apakah anda yakin ingin hapus ?')">Delete</button>
</form>
<a href="<?= route('roles.show', ['role' => base64_encode($id)]) ?>"" id=" detail-book" data-toggle="tooltip" data-original-title="detail" data-id="{{ $id }}" class="detail btn btn-primary">
    Detail
</a>