<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    function store(Request $request) {
        if (!$request->hasFile('path'))
            return redirect()->route('category.index');

        $path = $request->file('path')
            ->store('public/image');

        $image = new Image();
        $image['path'] = $path;
        $image->save();

        return redirect()->route('category.index');
    }

    function destroy(Image $image) {
        $image->delete();
        return redirect()->route('category.index');
    }
}
