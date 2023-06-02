<div class="btn-group">

    <a class="btn btn-secondary btn-md me-2 mt-2" href="{{ route('admin.application.show', $id) }}">
        Detail</a>

    <a class="btn btn-warning btn-md me-2 mt-2" href="{{ route('admin.application.edit', $id) }}">
        Edit</a>

    <form action="{{ route('admin.application.destroy', $id) }}" method="POST" role="alert" alert-title="Hapus aplikasi"
        alert-text="Yakin ingin menghapusnya?">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-md me-2 mt-2">
            Hapus</button>
    </form>
</div>
