<?php
$category = $category ?? null;
?>
<!doctype html>
<html>
<head>

</head>
<body>
<form action="{{ $category ? route('category.update', $category) : route('category.store') }}" method="post">
    @csrf @if($category) @method('put') @endif
    <input type="text" id="title" name="name" placeholder="Title"/>
    <button class="btn create-button">create</button>
</form>
</body>
</html>
