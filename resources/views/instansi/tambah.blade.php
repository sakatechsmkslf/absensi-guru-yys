@extends('layout.main')

@section('main')
<section class="section">
    <div class="section-header">
        <h1>Tambah User</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">User</a></div>
            <div class="breadcrumb-item">Dashboard</div>
        </div>
    </div>

    <div class="section-body">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Form Tambah User</h5>
            </div>
            <div class="card-body">
                <form enctype="multipart/form-data" action="{{ route('user.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name') }}" placeholder="Masukkan nama">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="telp" class="form-label">No Telepon</label>
                            <input type="text" class="form-control" id="telp" name="telp"
                                value="{{ old('telp') }}" placeholder="08xxxxxxxxxx">
                            @error('telp')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username"
                                value="{{ old('username') }}" placeholder="Masukkan username">
                            @error('username')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Masukkan password">
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="uid_rfid" class="form-label">UID RFID</label>
                            <input type="text" class="form-control" id="uid_rfid" name="uid_rfid"
                                value="{{ old('uid_rfid') }}" placeholder="Masukkan UID RFID">
                            @error('uid_rfid')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                            @error('foto')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Role</label>
                            <div class="selectgroup selectgroup-pills">
                                @forelse ($role as $item)
                                    <label class="selectgroup-item">
                                        <input type="checkbox" name="role_id[]" value="{{ $item->id }}"
                                            class="selectgroup-input" {{ in_array($item->id, old('role_id', [])) ? 'checked' : '' }}>
                                        <span class="selectgroup-button">{{ $item->name }}</span>
                                    </label>
                                @empty
                                    <p class="text-muted mb-0">Tidak ada role</p>
                                @endforelse
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Instansi</label>
                            <div class="selectgroup selectgroup-pills">
                                @forelse ($instansi as $item)
                                    <label class="selectgroup-item">
                                        <input type="checkbox" name="instansi_id[]" value="{{ $item->id }}"
                                            class="selectgroup-input" {{ in_array($item->id, old('instansi_id', [])) ? 'checked' : '' }}>
                                        <span class="selectgroup-button">{{ $item->nama_instansi }}</span>
                                    </label>
                                @empty
                                    <p class="text-muted mb-0">Tidak ada instansi</p>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <div class="text-end mt-3">
                        <button type="submit" class="btn btn-primary px-4">Simpan</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>
@endsection
