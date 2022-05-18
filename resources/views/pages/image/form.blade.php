<!doctype html>
<html>
<head>

</head>
<body>
<form action="{{route('image.store')}}" method="post">
    @csrf
    <input type="hidden" name="product_id" value="{{$product->id}}">
    <input type="file" name="path">
    <button>create</button>
</form>
</body>
</html>
