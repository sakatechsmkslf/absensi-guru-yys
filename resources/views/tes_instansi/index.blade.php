<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table id="example2" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Instansi</th>
                        <th>Kepala Instansi</th>
                        <th>Alamat Instansi</th>
                        <th>Telp Instansi</th>
                        <th>Admin</th>
                        <th>Aksi</th>
                </thead>
                <tbody>
                    @foreach ($instansi as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_instansi }}</td>
                        <td>{{ $item->kepala_instansi}}</td>
                        <td>{{ $item->alamat_instansi}}</td>
                        <td>{{ $item->telp_instansi}}</td>
                        @foreach ($item->user as $user)
                        <td>{{ $user->name}}</td>
                        @endforeach
                        <td>
                            <form action="{{ route('instansi.destroy', $item->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <div class="form-button-action">
                                    {{-- edit --}}
                                    <a href="{{ route('instansi.edit', $item->id)}}" class="btn btn-outline-primary px-5 radius-30" >Edit</a>
                                    {{-- delete --}}
                                    <button type="submit" class="btn btn-outline-danger px-5 radius-30">Hapus</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Instansi</th>
                        <th>Kepala Instansi</th>
                        <th>Alamat Instansi</th>
                        <th>Telp Instansi</th>
                        <th>Admin</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
</body>
</html>
