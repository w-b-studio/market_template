<?php
$product = $product ?? null;
?>
<!doctype html>
<html>
<head>

</head>
<body>
<form action="{{ $product ? route('product.update', $product) : route('product.store') }}" method="post">
    @csrf @if($product) @method('put') @endif
    <input type="text" name="name" placeholder="Name"/>
    <input type="number" name="price" placeholder="Price"/>

    <input list="category_name" name="category_name">
    <datalist id="category_name">
        @foreach($categories as $category)
            <option value="{{ $category->name }}"></option>
        @endforeach
    </datalist>

    <button>create</button>
</form>
</body>
</html>
