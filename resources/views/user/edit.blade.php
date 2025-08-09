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
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Form Edit User</h5>
            </div>
            <div class="card-body">
                <form enctype="multipart/form-data" action="{{ route('user.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- nama & telp -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   value="{{ old('name', $user->name) }}" placeholder="Masukkan nama">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="telp" class="form-label">No Telepon</label>
                            <input type="text" class="form-control" id="telp" name="telp"
                                   value="{{ old('telp', $user->telp) }}" placeholder="08xxxxxxxxxx">
                        </div>
                    </div>

                    <!-- username & password -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username"
                                   value="{{ old('username', $user->username) }}" placeholder="Masukkan username">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                   placeholder="Kosongkan jika tidak ingin ubah password">
                        </div>
                    </div>

                    <!-- uid & foto -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="uid_rfid" class="form-label">UID RFID</label>
                            <input type="text" class="form-control" id="uid_rfid" name="uid_rfid"
                                   value="{{ old('uid_rfid', $user->uid_rfid) }}" placeholder="Masukkan UID RFID">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" class="form-control" id="foto" name="foto">
                            @if ($user->foto)
                                <p class="mt-2 text-muted">Foto lama:</p>
                                <img src="{{ asset('foto/' . $user->foto) }}" alt="Foto" width="100" class="rounded">
                            @endif
                        </div>
                    </div>

                    <!-- role & instansi -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Role</label>
                                <div class="selectgroup selectgroup-pills">
                                    @forelse ($role as $item)
                                        <label class="selectgroup-item">
                                            <input type="checkbox" name="role_id[]"
                                                value="{{ $item->id }}"
                                                class="selectgroup-input"
                                                {{ in_array($item->id, old('role_id', $user->roles->pluck('id')->toArray())) ? 'checked' : '' }}>
                                            <span class="selectgroup-button">{{ $item->name }}</span>
                                        </label>
                                    @empty
                                        <p class="text-muted mb-0">Tidak ada role</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Instansi</label>
                                <div class="selectgroup selectgroup-pills">
                                    @forelse ($instansi as $item)
                                        <label class="selectgroup-item">
                                            <input type="checkbox" name="instansi_id[]"
                                                value="{{ $item->id }}"
                                                class="selectgroup-input"
                                                {{ in_array($item->id, old('instansi_id', $user->instansi->pluck('id')->toArray())) ? 'checked' : '' }}>
                                            <span class="selectgroup-button">{{ $item->nama_instansi }}</span>
                                        </label>
                                    @empty
                                        <p class="text-muted mb-0">Tidak ada instansi</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary px-4">Simpan</button>
                        <button class="btn btn-danger" type="reset">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@push('script')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "pagingType": "full_numbers",
            "language": {
                "paginate": {
                    "first": "<i class='fas fa-angle-double-left'></i>",
                    "last": "<i class='fas fa-angle-double-right'></i>",
                    "next": "<i class='fas fa-chevron-right'></i>",
                    "previous": "<i class='fas fa-chevron-left'></i>"
                }
            }
        });
    });
</script>
@endpush

@push('style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endpush
