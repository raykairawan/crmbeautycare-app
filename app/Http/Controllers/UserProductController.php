<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class UserProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('users.allProducts', compact('products', 'categories'));
    }

    public function filter(Request $request)
    {
        $categories = Category::all();
        $query = Product::query();

        if ($request->has('category_id') && $request->category_id != '') {
            $query->where('category_id', $request->category_id);
        }

        $products = $query->get();
        return view('users.allProducts', compact('products', 'categories'));
    }

    public function addToCart(Product $product)
    {
        return redirect()->route('user.products.index');
    }
}
