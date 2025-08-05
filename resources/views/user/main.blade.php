@extends('layout.main')
@section('main')
    <section class="section">
        <div class="section-header">
            <h1>Halaman Management User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">User</a></div>
                <div class="breadcrumb-item">Dashboard</div>
            </div>
        </div>

        <div class="section-body">
            <a href="{{url('/userTambah')}}" class="btn btn-primary m-2">Tambah Data User</a>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data User</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md" id="example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Created At</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Irwansyah Saputra</td>
                                            <td>2017-01-09</td>
                                            <td>
                                                <div class="badge badge-success">Active</div>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-warning">Edit</a>
                                                <a href="#" class="btn btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Hasan Basri</td>
                                            <td>2017-01-09</td>
                                            <td>
                                                <div class="badge badge-success">Active</div>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-warning">Edit</a>
                                                <a href="#" class="btn btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Kusnadi</td>
                                            <td>2017-01-11</td>
                                            <td>
                                                <div class="badge badge-danger">Not Active</div>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-warning">Edit</a>
                                                <a href="#" class="btn btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Rizal Fakhri</td>
                                            <td>2017-01-11</td>
                                            <td>
                                                <div class="badge badge-success">Active</div>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-warning">Edit</a>
                                                <a href="#" class="btn btn-danger">Hapus</a>
                                            </td>
                                        </tr>
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
