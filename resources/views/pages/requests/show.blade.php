<!doctype html>
<html>
<head>

</head>
<body>
{{ $request->number }}
<form action="{{ route('request.destroy', $request) }}" method="post">
    @csrf @method('delete')

    <button>
        DELETE
    </button>
</form>
</body>
</html>
