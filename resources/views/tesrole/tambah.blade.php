<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Role CRUD</title>
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

    <form action="{{ route('role.store') }}" method="POST">
        @csrf
        <input type="text" name="name">
        @foreach ($permission as $item)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $item->name }}"
                    {{ collect(old('permissions'))->contains($item->name) ? 'checked' : '' }}>
                <label class="form-check-label">{{ $item->name }}</label>
            </div>
        @endforeach
        <input type="submit">

    </form>
</body>

</html>
