<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="{{ route('tapel.create') }}">Tambah</a>


    <table id="example2" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Aksi</th>
                </thead>
                <tbody>
                    @foreach ($tapel as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->kode }}</td>
                        <td>
                            <form action="{{ route('tapel.destroy', $item->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <div class="form-button-action">
                                    {{-- edit --}}
                                    <a href="{{ route('tapel.edit', $item->id)}}" class="btn btn-outline-primary px-5 radius-30" >Edit</a>
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
                        <th>Kode</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
</body>
</html>
