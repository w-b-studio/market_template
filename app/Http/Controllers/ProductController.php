<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function store() {
        $data = request()->validated();
        $product = Product::query()
            ->create($data);

        return redirect()->route('product.create', $product);
    }


    function show(Product $product) {
        return view('product.show', [
            'products' => $product
        ]);
    }

    function edit(Product $product) {

        return view('product.form', [
            'product' => $product
        ]);
    }

    function update(Product $product) {
        $data = request()->validated();

        $product->update($data);
        return redirect()->route('product.show', $product);
    }
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }
}
