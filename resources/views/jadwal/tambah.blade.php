@extends('layout.main')
@section('main')
    <section class="section">
        <div class="section-header">
            <h1>Tambah Absensi (Dummy)</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Absensi</a></div>
                <div class="breadcrumb-item">Dashboard</div>
            </div>
        </div>
        <div class="section-body">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Form Absensi</h5>
                </div>
                <div class="card-body">
                    <form action="#" method="POST">
                        @csrf
                        <div class="row">
                            <!-- tapel_id dropdown -->
                            <div class="col-md-6 mb-3">
                                <label for="tapel" class="form-label">Tahun Pelajaran</label>
                                <select class="form-control" id="tapel" name="tapel_id">
                                    <option value="1">2024/2025</option>
                                    <option value="2">2025/2026</option>
                                </select>
                            </div>

                            <!-- instansi checkbox -->
                            {{-- Untuk tambah instansi tidak perlu pakai array, karena satu instansi hanya boleh memberikan 1 jadwal kepada setiap user dalam satu hari --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Instansi</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="instansi_id[]" value="1"
                                        id="instansi1">
                                    <label class="form-check-label" for="instansi1">SMA Negeri 1</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="instansi_id[]" value="2"
                                        id="instansi2">
                                    <label class="form-check-label" for="instansi2">SMP Negeri 2</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- user_id pencarian -->
                            <div class="col-md-6 mb-3">
                                <label for="userSearch" class="form-label">Cari User</label>
                                <input type="text" id="userSearch" class="form-control" placeholder="ketik nama user...">
                                <ul class="list-group mt-2" id="userResults" style="display:none;">
                                    <!-- hasil dummy -->
                                    <li class="list-group-item">aziz ramadhan</li>
                                    <li class="list-group-item">azizah putri</li>
                                    <li class="list-group-item">muhammad aziz</li>
                                    <li class="list-group-item">azis kurnia</li>
                                    <li class="list-group-item">azizi fadilah</li>
                                </ul>
                            </div>

                            <!-- hari -->
                            <div class="col-md-6 mb-3">
                                <label for="hari" class="form-label">Hari</label>
                                <select class="form-control" id="hari" name="hari">
                                    <option value="senin">Senin</option>
                                    <option value="selasa">Selasa</option>
                                    <option value="rabu">Rabu</option>
                                    <option value="kamis">Kamis</option>
                                    <option value="jumat">Jumat</option>
                                    <option value="sabtu">Sabtu</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <!-- datang -->
                            <div class="col-md-6 mb-3">
                                <label for="datang" class="form-label">Jam Datang</label>
                                <input type="time" id="datang" name="datang" class="form-control">
                            </div>

                            <!-- pulang -->
                            <div class="col-md-6 mb-3">
                                <label for="pulang" class="form-label">Jam Pulang</label>
                                <input type="time" id="pulang" name="pulang" class="form-control">
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const input = document.getElementById("userSearch");
            const results = document.getElementById("userResults");
            const items = results.getElementsByTagName("li");

            input.addEventListener("keyup", function() {
                const filter = input.value.toLowerCase();
                let found = false;

                for (let i = 0; i < items.length; i++) {
                    let text = items[i].textContent.toLowerCase();
                    if (text.includes(filter) && filter !== "") {
                        items[i].style.display = "";
                        found = true;
                    } else {
                        items[i].style.display = "none";
                    }
                }

                results.style.display = found ? "block" : "none";
            });

            // bikin setiap li bisa di-klik
            for (let i = 0; i < items.length; i++) {
                items[i].addEventListener("click", function() {
                    input.value = this.textContent; // masukin text ke input
                    results.style.display = "none"; // sembunyikan list lagi
                });
            }
        });
    </script>
@endpush
