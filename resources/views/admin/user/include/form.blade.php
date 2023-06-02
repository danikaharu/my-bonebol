<div class="row">
    <div class="col-md-12 form-group">
        <label>Nama</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
            value="{{ isset($user) ? $user->name : old('name') }}">
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-12 form-group">
        <label>Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
            value="{{ isset($user) ? $user->email : old('email') }}">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-12 form-group">
        <label>Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
        @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-12 form-group">
        <label>Avatar</label>
        <input type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar">
        @error('avatar')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
