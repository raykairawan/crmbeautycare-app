<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'img_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
    
        try {
            $category = new Category();
            $category->name = $request->name;
            $category->description = $request->description;

            if ($request->hasFile('img_url')) {
                $path = $request->file('img_url')->store('categories', 'public');
                $category->img_url = $path;
            }

            $category->save();
    
            return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Failed to create category: ' . $e->getMessage());
        }
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'img_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        try {
            $category->fill($request->all());
    
            if ($request->hasFile('img_url')) {
                if ($category->img_url) {
                    Storage::disk('public')->delete($category->img_url);
                }
                $path = $request->file('img_url')->store('categories', 'public');
                $category->img_url = $path;
            }
    
            $category->save();
    
            return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Failed to update category: ' . $e->getMessage());
        }
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index');
    }
}
