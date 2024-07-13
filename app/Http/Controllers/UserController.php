<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
    {
        $categories = Category::all();
        return view('users.dashboard', compact('categories'));
    }

    public function showCategory(Category $category)
    {
        $products = $category->products;
        $categories = Category::all();
        return view('users.category', compact('category', 'products', 'categories'));
    }

    public function allCategories()
    {
        $categories = Category::all();
        if ($categories->isEmpty()) {
            dd('No categories found');
        }
        return view('users.allCategories', compact('categories'));
    }

    
}
