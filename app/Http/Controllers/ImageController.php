<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    function create(Product $product) {
        return view('pages.image.form', [
            'product' => $product
        ]);
    }

    function store(Request $request) {
        if (!$request->hasFile('path'))
            return redirect()->route('product.index');

        $path = $request->file('path')
            ->store('public/image');

        $image = new Image();
        $image->fill([
            'path' => $path,
            'product_id' => $request->product_id
        ]);
        $image->save();

        return redirect()->route('product.index');
    }

    function destroy(Image $image) {
        if (!$image->path)
            return redirect()->route('product.index');

        $image->delete();
        Storage::delete($image->path);

        return redirect()->route('product.index');
    }
}
