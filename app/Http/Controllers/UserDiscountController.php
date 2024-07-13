<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;

class UserDiscountController extends Controller
{
    public function index()
    {
        $discounts = Discount::all();
        return view('users.allDiscounts', compact('discounts'));
    }

}
