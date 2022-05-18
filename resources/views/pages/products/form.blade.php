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

    <select name="category_id">

        <option value="all">All</option>

        @foreach($categories as $category)
            <option value="{{ $category->id }}">
                {{ $category->name }}
            </option>
        @endforeach
    </select>

    <button>create</button>
</form>
</body>
</html>
