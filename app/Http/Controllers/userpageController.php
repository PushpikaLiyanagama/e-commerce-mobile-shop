<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class userpageController extends Controller
{
    public function index()
    {
        $product=Product::paginate(9);
        return view('home.index',compact('product'));
    }
}
