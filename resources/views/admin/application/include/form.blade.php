<div class="row">
    <div class="col-md-12 form-group">
        <label>Instansi</label>
        <select class="form-select @error('agency_id') is-invalid @enderror" name="agency_id">
            <option selected disabled>{{ __('-- Pilih instansi --') }}</option>
            @foreach ($agencies as $agency)
                <option value="{{ $agency->id }}"
                    {{ isset($application) && $application->agency_id == $agency->id ? 'selected' : (old('agency_id') == $agency->id ? 'selected' : '') }}>
                    {{ $agency->name }}</option>
            @endforeach
        </select>
        @error('agency_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-12 form-group">
        <label>Kategori Aplikasi</label>
        <select class="form-select @error('category_id') is-invalid @enderror" name="category_id">
            <option selected disabled>{{ __('-- Pilih kategori --') }}</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    {{ isset($application) && $application->category_id == $category->id ? 'selected' : (old('category_id') == $category->id ? 'selected' : '') }}>
                    {{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-12 form-group">
        <label>Nama Aplikasi</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
            value="{{ isset($application) ? $application->name : old('name') }}">
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-12 form-group">
        <label>Singkatan Aplikasi</label>
        <input type="text" class="form-control @error('short_name') is-invalid @enderror" name="short_name"
            value="{{ isset($application) ? $application->short_name : old('short_name') }}">
        @error('short_name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-12 form-group">
        <label>URL Aplikasi</label>
        <input type="text" class="form-control @error('url') is-invalid @enderror" name="url"
            value="{{ isset($application) ? $application->url : old('url') }}">
        @error('url')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-12 form-group">
        <label>Jenis layanan</label>
        <select class="form-select @error('service_type') is-invalid @enderror" name="service_type">
            <option selected disabled>{{ __('-- Pilih jenis layanan --') }}</option>
            <option value="1"
                {{ isset($application) && $application->service_type == 1 ? 'selected' : (old('service_type') == 1 ? 'selected' : '') }}>
                Umum</option>
            <option value="2"
                {{ isset($application) && $application->service_type == 2 ? 'selected' : (old('service_type') == 2 ? 'selected' : '') }}>
                Khusus</option>
        </select>
        @error('service_type')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-12 form-group">
        <label>Wilayah layanan</label>
        <select class="form-select @error('service_area') is-invalid @enderror" name="service_area">
            <option selected disabled>{{ __('-- Pilih wilayah layanan --') }}</option>
            <option value="1"
                {{ isset($application) && $application->service_area == 1 ? 'selected' : (old('service_area') == 1 ? 'selected' : '') }}>
                Daerah</option>
            <option value="2"
                {{ isset($application) && $application->service_area == 2 ? 'selected' : (old('service_area') == 2 ? 'selected' : '') }}>
                Pusat</option>
        </select>
        @error('service_area')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-12 form-group">
        <label>Status</label>
        <select class="form-select @error('status') is-invalid @enderror" name="status">
            <option selected disabled>{{ __('-- Pilih status --') }}</option>
            <option value="1"
                {{ isset($application) && $application->status == 1 ? 'selected' : (old('status') == 1 ? 'selected' : '') }}>
                Aktif</option>
            <option value="2"
                {{ isset($application) && $application->status == 2 ? 'selected' : (old('status') == 2 ? 'selected' : '') }}>
                Tidak Aktif</option>
        </select>
        @error('status')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
