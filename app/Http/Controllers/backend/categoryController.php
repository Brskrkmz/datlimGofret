<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\categoryRequest;
use App\Models\category;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\RedirectResponse;


class categoryController extends Controller
{
    public function __construct(){
        $this->returnUrl = "/categories";
    }
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $categories = category::all();
        return view('backend.categories.index',["categories" => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('backend.categories.insertForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  categoryRequest  $request
     * @return Redirect
     */
    public function store(categoryRequest $request): RedirectResponse
    {    
        $category = new category();

        $data = $this->prepare($request, $category->getFillable());
        $category->slug = Str::slug($request->name);
        $category->fill($data);
        $category->save();

        return Redirect::to($this->returnUrl);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(category $category)//birinci parametre (category) model adı, İkinci parametre ($category) route de id gönderilen kısma gelen segment yani /categories/{category}/edit
    {
        return view('backend.categories.updateForm', ['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  categoryRequest  $request
     * @param  category $category
     * @return Redirect
     */
    public function update(categoryRequest $request, category $category): RedirectResponse
    {
        $data = $this->prepare($request, $category->getFillable());
        $category->fill($data);

        $category->save();

        return Redirect::to($this->returnUrl);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  category $category
     * @return \Illuminate\Http\jsonResponse
     */
    public function destroy(category $category)
    {
        $category->forceDelete();
        return Response()->json(["message"=>"Done", "id"=>$category->category_id]);
    }
}
