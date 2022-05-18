<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function index() {
        return view('pages.categories.index');
    }

    function create() {
        return view('pages.categories.form');
    }

    function store() {
        $data = request()->validate(
            ['name' => 'required|max:255',]
        );
        $category = Category::query()
            ->create($data);
        $category->save();

        return view('pages.categories.index');
    }

    function show(Category $category) {
        return view('pages.categories.show', [
            'category' => $category
        ]);
    }

    function edit(Category $category) {
        return view('pages.categories.form', [
            'category' => $category
        ]);
    }

    function update(Category $category) {
        $data = request()->validate(
            ['name' => 'required|max:255',]
        );

        $category->update($data);
        return redirect()->route('category.show', $category);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index');
    }
}
