<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;

class homeController extends Controller
{
    
    public function index()
    {
        $categories = category::all()->where("is_active", true);
        $products = product::all()->where("is_active", true);
        return view('frontend.home.index',['categories' => $categories, "products" => $products]);
    }
}
?>