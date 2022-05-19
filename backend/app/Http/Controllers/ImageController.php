<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use \Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{
    public function getImage($id)
    {
        $image = Image::where('product_id',$id)->latest()->first();

        return response()->json($image,200);
    }

    function createImage(Request $request, $id) {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
    
        ]);
        $file = $request->file('image');
        $fileName                   	= $file->getClientOriginalName();
        $fileFullName               	= time()."_".$fileName;
        $path                       	= $fileFullName;
        $file->move(public_path('product-pictures/'), $path);
        $fullpath                   	= 'product-pictures/'.$path;



        $ApplicantImage = Image::create([
            'product_id'=> $id,
            'path' => $fullpath
        ]);
        
        return response(["data"=>$ApplicantImage, "status"=> "Upload was succesfull"],200);
    }

    function destroy(Image $image) {
        if (!$image->path)
            return redirect()->route('product.index');

        $image->delete();
        Storage::delete($image->path);

        return redirect()->route('product.index');
    }
}