<div class="row">
    <div class="col-md-12 form-group">
        <label>Nama</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
            value="{{ isset($category) ? $category->name : old('name') }}">
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-12 form-group">
        <label>Deskripsi</label>
        <input type="text" class="form-control @error('description') is-invalid @enderror" name="description"
            value="{{ isset($category) ? $category->description : old('description') }}">
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    @isset($category)
        <div class="mb-3 col-md-12">
            <div class="row">
                <div class="col-md-2">
                    @if ($category->icon == null)
                        <label for="icon" class="form-label">Gambar Lama</label>
                        <img src="https://via.placeholder.com/350?text=File+Tidak+Ditemukan" alt="Icon"
                            class="rounded mb-2 mt-2" alt="Icon" width="200" height="150"
                            style="object-fit: cover">
                    @else
                        <label for="icon" class="form-label">Icon Lama</label>
                        <div class="form-group">
                            <a href="{{ asset('storage/upload/kategori/' . $category->icon) }}" target="blank"
                                class="btn btn-outline-dark btn-sm"><i class="bx bxs-file-image me-1"></i>Lihat Gambar</a>
                        </div>
                    @endif
                </div>
                <div class="col-md-10">
                    <div class="form-group ms-3">
                        <label for="icon" class="form-label">Upload Icon</label>
                        <input class="form-control  @error('icon') is-invalid @enderror" type="file" name="icon" />
                        @error('icon')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="mb-3 col-md-12">
            <label for="icon" class="form-label">Upload Icon</label>
            <input class="form-control @error('icon') is-invalid @enderror" type="file" name="icon" />
            @error('icon')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    @endisset
</div>
