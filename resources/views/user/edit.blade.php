@extends('layout.main')
@section('main')
    <section class="section">
        <div class="section-header">
            <h1>Edit User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">User</a></div>
                <div class="breadcrumb-item">Dashboard</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Edit User</h5>
                </div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <div class="card-body">
                    <form enctype="multipart/form-data" action="{{ route('user.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- nama & telp -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control border-primary" id="name" name="name"
                                    value="{{ old('name', $user->name) }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="telp" class="form-label">No Telepon</label>
                                <input type="text" class="form-control border-primary" id="telp" name="telp"
                                    value="{{ old('telp', $user->telp) }}">
                            </div>
                        </div>

                        <!-- username & password -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control border-primary" name="username" id="username"
                                    value="{{ old('username', $user->username) }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="password" class="form-label">Password (kosongkan jika tidak diganti)</label>
                                <input type="password" class="form-control border-primary" id="password" name="password">
                            </div>
                        </div>

                        <!-- uid & foto -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="uid_rfid" class="form-label">UID RFID</label>
                                <input type="text" class="form-control border-primary" id="uid_rfid" name="uid_rfid"
                                    value="{{ old('uid_rfid', $user->uid_rfid) }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="foto" class="form-label">Foto</label>
                                <input type="file" class="form-control border-primary" id="foto" name="foto">
                                @if ($user->foto)
                                    <small class="d-block mt-2">Foto saat ini:</small>
                                    <img src="{{ asset('storage/' . $user->foto) }}" alt="Foto User" width="80"
                                        class="rounded border border-primary mt-1">
                                @endif
                            </div>
                        </div>

                        <!-- role & instansi -->
                        <div class="row">
                            {{-- Role --}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Role</label>
                                    <div class="selectgroup selectgroup-pills">
                                        @forelse ($role as $item)
                                            <label class="selectgroup-item">
                                                <input type="checkbox" name="role_id[]" value="{{ $item->id }}"
                                                    class="selectgroup-input"
                                                    {{ in_array($item->id, old('role_id', $userRoles ?? [])) ? 'checked' : '' }}>
                                                <span
                                                    class="selectgroup-button {{ in_array($item->id, old('role_id', $userRoles ?? [])) ? 'bg-primary text-white' : '' }}">
                                                    {{ $item->name }}
                                                </span>
                                            </label>
                                        @empty
                                            <p class="text-muted mb-0">Tidak ada role</p>
                                        @endforelse
                                    </div>
                                </div>
                            </div>

                            {{-- Instansi --}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Instansi</label>
                                    <div class="selectgroup selectgroup-pills">
                                        @forelse ($instansi as $item)
                                            <label class="selectgroup-item">
                                                <input type="checkbox" name="instansi_id[]" value="{{ $item->id }}"
                                                    class="selectgroup-input"
                                                    {{ in_array($item->id, old('instansi_id', $userInstansi ?? [])) ? 'checked' : '' }}>
                                                <span
                                                    class="selectgroup-button {{ in_array($item->id, old('instansi_id', $userInstansi ?? [])) ? 'bg-primary text-white' : '' }}">
                                                    {{ $item->nama_instansi }}
                                                </span>
                                            </label>
                                        @empty
                                            <p class="text-muted mb-0">Tidak ada instansi</p>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="text-end">
                            <button type="submit" class="btn btn-primary px-4">Update</button>
                            <a href="{{ route('user.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection
