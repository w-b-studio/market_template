<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function index() {
        $products = Product::all();
        return response()->json($products, 200);
    }

    function store() {
        $data = request()->validate([
            'name' => 'required',
            'price' => 'required',
            'category' => 'string|required',
            'first_char' => 'string',
            'second_char' => 'string',
            'third_char' => 'string',
            'fourth_char' => 'string',
            'fivth_char' => 'string'
        ]);

        $category = Category::where('name', $data['category'])->first();
        $data['category_id'] = $category->id;

        $product = Product::create($data);

        return response()->json($product, 200);
    }

    function show(Product $product) {
        return view('pages.products.show', [
            'product' => $product
        ]);
    }

    function edit(Product $product) {

        return view('product.form', [
            'product' => $product
        ]);
    }

    function update(Product $product) {
        $data = request()->validate([
            'name' => 'required',
            'price' => 'required',
        ]);;

        $product->update($data);
        return redirect()->route('product.show', $product);
    }

    public function deleteProduct($id)
    {
        $product = Product::where('id',$id)->first();
        $product->delete();
        return response()->json(["Delte was succesfully"], 200);
    }
}