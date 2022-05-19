<!doctype html>
<html>
<head>

</head>
<body>
{{ $category->name }}
<form action="{{ route('category.destroy', $category) }}" method="post">
    @csrf @method('delete')

    <button class="btn create-button">
        DELETE
    </button>
</form>
</body>
</html>
