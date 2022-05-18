<!doctype html>
<html>
<head>

</head>
<body>
    <a href="{{ route('product.create') }}">add new</a>
    @foreach($products as $product)
        {{$product->name}} = {{$product->price}}
        <a href="{{route('product.show', $product)}}">Detail</a>
        <br/>
    @endforeach
</body>
</html>

