<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function store() {
        $data = request()->validated();
        $category = Category::query()
            ->create($data);
        $category->save();

        return redirect()->route('category.create', $category);
    }

    function show(Category $category) {
        return view('category.show', [
            'categories' => $category
        ]);
    }

    function edit(Category $category) {
        return view('category.form', [
            'category' => $category
        ]);
    }

    function update(Category $category) {
        $data = request()->validated();

        $category->update($data);
        return redirect()->route('category.show', $category);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index');
    }
}
