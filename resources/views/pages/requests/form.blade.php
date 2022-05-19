<?php
$request = $request ?? null;
?>
<!doctype html>
<html>
<head>

</head>
<body>
<form action="{{ $request ? route('request.update', $request) : route('request.store') }}" method="post">
    @csrf @if($request) @method('put') @endif
    <input type="number" name="number" placeholder="Number"/>
    <button>create</button>
</form>
</body>
</html>
