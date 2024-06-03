<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Asset\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();

        return view('category.index', compact('categories'));
    }

    public function create()
    {
        $data = [
            'method' => 'POST',
            'route' => route('category.store'),
            'action' => __('Create'),
        ];

        return view('category.form', compact('data'));
    }

    public function store(CategoryRequest $request)
    {
        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('category.index');
    }

    public function edit(Category $category)
    {
        $data = [
            'method' => 'PUT',
            'route' => route('category.update', $category),
            'action' => __('Update'),
        ];

        return view('category.form', compact('data', 'category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('category.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('category.index');
    }
}
