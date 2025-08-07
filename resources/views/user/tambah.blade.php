@extends('layout.main')
@section('main')
    <section class="section">
        <div class="section-header" style="">
            <h1>Tambah User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">User</a></div>
                <div class="breadcrumb-item">Dashboard</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card shadow-sm" style="">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Tambah User</h5>
                </div>
                <div class="card-body">
                    <form enctype="multipart/form-data" action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Masukkan nama">
                        </div>

                        <div class="mb-3">
                            <label for="telp" class="form-label">No Telepon</label>
                            <input type="text" class="form-control" id="telp" name="telp"
                                placeholder="08xxxxxxxxxx">
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>

                            <input type="text" class="form-control" name="username" id="username"
                                placeholder="Masukkan username">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Masukkan password">
                        </div>

                        <div class="mb-3">
                            <label for="uid_rfid" class="form-label">UID RFID</label>
                            <input type="text" class="form-control" id="uid_rfid" name="uid_rfid"
                                placeholder="Masukkan UID RFID">
                        </div>

                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" class="form-control" id="foto" name="foto">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            <select class="form-select" id="role" name="role_id">
                                <option selected disabled>Pilih Role</option>
                                @forelse ($role as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <div class="mb-3">
                            <select class="form-select" name="instansi_id" id="instansi_id">
                                <option selected disabled>Pilih Instansi</option>
                                <option value="1">SMK</option>
                                {{-- @forelse ($instansi as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @empty
                                @endforelse --}}
                            </select>
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
                "pagingType": "full_numbers", // biar ada prev, next, first, last
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
