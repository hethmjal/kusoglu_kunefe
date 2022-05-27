<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;

class FrontCotroller extends Controller
{
    public function index()
    {
        $categories = Category::with('product')->get();
        //return $categories[0]->product[0]->name;
        return view('menu',['categories'=>$categories]);
    }
}