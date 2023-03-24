<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function index(category $category)
    {
        $allCategories = category::all()->where("is_active", true);
        
        return view('frontend.home.index',['categories' => $allCategories, "products" => $category->products]);
    }
}
