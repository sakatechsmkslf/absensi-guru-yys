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

    <form action="{{ route('tapel.update', $tapel->id) }}" method="POST">
        @csrf
        @method('put')
        <input type="text" name="kode" placeholder="Nama Instansi">
        <input type="submit">
    </form>
</body>

</html>
