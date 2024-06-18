<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        return view('users.category', compact('category', 'products'));
    }

    public function allCategories()
    {
        $categories = Category::all();
        return view('users.allCategories', compact('categories'));
    }
}
