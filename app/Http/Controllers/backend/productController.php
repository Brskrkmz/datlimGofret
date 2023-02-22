<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\productRequest;
use App\Models\product;
use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\RedirectResponse;


class productController extends Controller
{
    public function __construct(){
        $this->returnUrl = "/products";
    }
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $products = product::all();
        return view('backend.products.index',["products" => $products]);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return View
     */
    public function create(): View
    {   $category = category::all();
        return view('backend.products.insertForm', ["categories" => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  productRequest  $request
     * @return Redirect
     */
    public function store(productRequest $request): RedirectResponse
    {    
        $product = new product();

        $data = $this->prepare($request, $product->getFillable());
        $product->slug = Str::slug($request->name);
        $product->fill($data);
        $product->save();

        return Redirect::to($this->returnUrl);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  product $product
     * @param  int  category $category
     * @return View
     */
    public function edit(product $product, category $category)//birinci parametre (product) model adı, İkinci parametre ($product) route de id gönderilen kısma gelen segment yani /products/{product}/edit
    {
        $category = category::all();
        return view('backend.products.updateForm', ['product'=>$product, 'categories'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  productRequest  $request
     * @param  product $product
     * @return Redirect
     */
    public function update(productRequest $request, product $product): RedirectResponse
    {
        $data = $this->prepare($request, $product->getFillable());
        $product->fill($data);

        $product->save();

        return Redirect::to($this->returnUrl);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  product $product
     * @return \Illuminate\Http\jsonResponse
     */
    public function destroy(product $product)
    {
        $product->forceDelete();
        return Response()->json(["message"=>"Done", "id"=>$product->product_id]);
    }
}
