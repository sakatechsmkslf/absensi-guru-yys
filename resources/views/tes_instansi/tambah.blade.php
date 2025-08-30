<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('instansi.store') }}" method="POST">
        @csrf
        <input type="text" name="nama_instansi" placeholder="Nama Instansi">
        <input type="text" name="kepala_instansi" placeholder="Kepala Instansi">
        <input type="text" name="alamat_instansi" placeholder="Alamat Instansi">
        <input type="number" name="telp_instansi" placeholder="Nomor Telepon">
        <select name="user_id" id="">
        @foreach ($user as $item)
            <option selected disabled>Pilih Admin</option>
            <option value="{{ $item->id }}"
                {{ old('user_id', $item->id) == $item->id ? 'selected' : '' }}>
                {{ $item->name }}
            </option>
        @endforeach
        </select>
        <input type="submit">
    </form>
</body>

</html>
