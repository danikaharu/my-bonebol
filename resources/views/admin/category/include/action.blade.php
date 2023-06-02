<div class="btn-group">

    <a class="btn btn-warning btn-md me-2 mt-2" href="{{ route('admin.category.edit', $id) }}">
        Edit</a>

    <form action="{{ route('admin.category.destroy', $id) }}" method="POST" role="alert" alert-title="Hapus instansi"
        alert-text="Yakin ingin menghapusnya?">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-md me-2 mt-2">
            Hapus</button>
    </form>
</div>
