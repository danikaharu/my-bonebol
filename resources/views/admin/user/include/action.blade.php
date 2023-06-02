<div class="flex">

    <a class="btn btn-warning btn-sm me-2 mt-2" href="{{ route('admin.user.edit', $id) }}">
        Edit</a>

    <form action="{{ route('admin.user.destroy', $id) }}" method="POST" role="alert" alert-title="Hapus pengguna"
        alert-text="Yakin ingin menghapusnya?">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm me-2 mt-2">
            Hapus</button>
    </form>
</div>
