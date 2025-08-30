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

    <form action="{{ route('tapel.store') }}" method="POST">
        @csrf
        <input type="text" name="kode" placeholder="Masukkan kode (contoh: 2025/2026)">
        <input type="submit">
    </form>
</body>

</html>
