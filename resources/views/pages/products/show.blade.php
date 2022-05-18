<!doctype html>
<html>
<head>

</head>
<body>
{{ $product->name }}
<form action="{{ route('product.destroy', $product) }}" method="post">
    @csrf @method('delete')

    <button class="btn create-button">
        DELETE
    </button>
</form>
@foreach($product->images as $image)
    <form action="{{route('image.destroy', $image)}}" method="post">
        @csrf @method('delete')
        Delete image {{$image->id}}
        <button class="btn create-button">
            DELETE
        </button>
    </form>
@endforeach
<a href="{{route('image.create', $product)}}">Add image</a>
</body>
</html>
