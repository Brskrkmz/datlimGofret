<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class homeController extends Controller
{
    
    public function index($categorySlug = ""):View
    {
        $products = product::all()->where('is_active', true);
        $categories = category::all()->where('is_active', true);
        return view('frontend.home.index',['categories' => $categories, "products" => $products]);
    }
}
?>