<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function index() {
        $category = Category::with('product')->get();
        return response()->json($category, 200);
    }

    function getCategoryById($id) {
        $category = Category::with('product')->where('id', $id)->first();
        return response()->json($category, 200);
    }

    function store() {
        $data = request()->validate(
            ['name' => 'required|max:255',]
        );
        $category = Category::create($data);

        return response()->json($category, 200);
    }
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return response()->json(["Delete was succesfull"], 200);
    }
}