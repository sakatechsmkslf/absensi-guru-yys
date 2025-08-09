<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('instansi.store') }}" method="POST">
        @csrf
        <input type="text" name="nama_instansi">
        <input type="text" name="kepala_instansi">
        <input type="text" name="alamat_instansi">
        <input type="number" name="alamat_instansi">
    </form>
</body>
</html>
