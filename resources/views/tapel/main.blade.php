@extends('layout.main')
@section('main')
    <section class="section">
        <div class="section-header">
            <h1>Halaman Management Tahun Pelajaran</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Tapel</a></div>
                <div class="breadcrumb-item">Dashboard</div>
            </div>
        </div>

        <div class="section-body">
            <div class="shadow pb-2">
                <a href="{{ route('tapel.create') }}" class="btn btn-primary m-2 shadow">Tambah Data Tapel</a>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header">
                            <h4>Data Kaldik</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md" id="example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tahun</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @forelse ($tapel as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td class="d-flex gap-2 m-4">
                                                    <a href="{{ route('role.edit', $item->id) }}"
                                                        class="btn btn-warning">Edit</a>
                                                    <form action="{{ route('role.destroy', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </form>
                                                </td>

                                                {{-- @foreach ($item->tag as $k)
                                                {{ $k->nama }},
                                                @endforeach INI CONTOH UNTUK FOREACH --}}
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">Data Tapel Kosong</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    {{-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script> --}}
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                responsive: true
            });
        });
    </script>
@endpush

@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endpush
