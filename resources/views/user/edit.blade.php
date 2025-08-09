@extends('layout.main')
@section('main')
    <section class="section">
        <div class="section-header" style="">
            <h1>Edit User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">User</a></div>
                <div class="breadcrumb-item">Dashboard</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card shadow-sm" style="">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Form Edit User</h5>
                </div>
                <div class="card-body">
                    <form enctype="multipart/form-data" action="{{ route('user.store') }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" placeholder="Masukkan nama lengkap"
                                value="{{ $user->name }}">
                        </div>

                        <div class="mb-3">
                            <label for="telp" class="form-label">No Telepon</label>
                            <input type="text" class="form-control" id="telp" placeholder="08xxxxxxxxxx"
                                value="{{ $user->telp }}">
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Masukkan username"
                                value="{{ $user->username }}">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Masukkan password"
                                value="{{ $user->password }}">
                        </div>

                        <div class="mb-3">
                            <label for="uid_rfid" class="form-label">UID RFID</label>
                            <input type="text" class="form-control" id="uid_rfid" placeholder="Masukkan UID RFID"
                                value="{{ $user->uid_rfid }}">
                        </div>

                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto</label>

                            <input type="file" class="form-control" id="foto" name="foto" accept="image/*"
                                onchange="tampilkanNamaFile()">

                            {{-- preview nama file --}}
                            <p id="namaFile" class="mt-2 text-muted">File lama: {{ $user->foto }}</p>

                            {{-- preview gambar lama --}}
                            <img src="{{ asset('foto/' . $user->foto) }}" alt="" width="50%" class="p-2 rounded"
                                id="previewFoto">
                        </div>

                        <script>
                            function tampilkanNamaFile() {
                                const input = document.getElementById('foto');
                                const namaFile = input.files[0]?.name || "No file chosen";
                                document.getElementById('namaFile').innerText = `File dipilih: ${namaFile}`;

                                // preview gambar (opsional)
                                const reader = new FileReader();
                                reader.onload = function(e) {
                                    document.getElementById('previewFoto').src = e.target.result;
                                };
                                if (input.files[0]) reader.readAsDataURL(input.files[0]);
                            }
                        </script>



                        <div class="mb-3">
                            <label for="instansi" class="form-label">Instansi</label>
                            <select class="form-select" id="instansi">
                                @foreach ($instansi as $item)
                                <option selected disabled>Pilih Instansi</option>
                                    <option value="{{ $item->id }}"
                                        {{ old('instansi_id', $instansi->instansi_id) == $item->id ? 'selected' : '' }}>
                                        {{ $item->nama }}
                                    </option>
                                @endforeach

                                {{-- <option value="1">SMK</option>
                                <option value="2">Ma</option>
                                <option value="3">MTS</option> --}}
                            </select>
                        </div>

                        <div class="text-end">
                            <button type="button" class="btn btn-primary px-4">Simpan</button>
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
