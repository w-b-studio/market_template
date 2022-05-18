<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function index() {
        $products = Product::all();
        return view('pages.products.index', [
            'products' => $products
        ]);
    }

    function create() {
        $categories = Category::all();
        return view('pages.products.form', [
            'categories' => $categories
        ]);
    }

    function store() {
        $data = request()->validate([
            'name' => 'required',
            'price' => 'required',
        ]);
        $product = Product::query()
            ->create($data);

        $product->category()->associate(request()->category_id);
        $product->save();

        return redirect()->route('product.index', $product);
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

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }
}
