<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\productImageRequest;
use App\Models\product;
use App\Models\productImage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Contracts\View\View;
use Storage;
use Symfony\Component\HttpFoundation\RedirectResponse;



class productImageController extends Controller
{
    public function __construct(){
        $this->returnUrl = '/productImages/{}/images';
        $this->fileRepo = "public/productImages"; //Resmin ekleneceği dosyayı oluşturur ve resimleri buraya ekler.
    }
    /**
     * Display a listing of the resource.
     * @param product $product
     * @return View
     */
    public function index(product $product)
    {
        return view('backend.images.index',["product" => $product]);
    }

    /**
     * Show the form for creating a new resource.
     * @param product $product
     * @return View
     */
    public function create(product $product): View
    {  
        return view('backend.images.insertForm', ["product" => $product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  product  $product
     * @param  productImageRequest  $request
     * @return RedirectResponse
     */
    public function store(product $product, productImageRequest $request): RedirectResponse
    {    
        $productImage = new productImage();

        $data = $this->prepare($request, $productImage->getFillable());
        $productImage->fill($data);
        $productImage->save();

        $this->editReturnUrl($request->product_id);

        return Redirect::to($this->returnUrl);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  productImage $productImage
     * @param  int  product $product
     * @return View
     */
    public function edit(product $product, productImage $image):View //birinci parametre (productImage) model adı, İkinci parametre ($image) route de id gönderilen kısma gelen segment yani /images/{productImage}/edit
    {
        return view('backend.images.updateForm', ['product'=>$product, 'productImage'=>$image]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  productImageRequest  $request
     * @param  productImage $productImage
     * @param  product $product
     * @return Redirect
     */
    public function update(productImageRequest $request, product $product, productImage $productImage): RedirectResponse
    {
        $data = $this->prepare($request, $productImage->getFillable());
        $productImage->fill($data);

        $productImage->save();
        $this->editReturnUrl($product->product_id); //editReturnUrl kendi tanımladığımız bir fonksiyonda sayfa sonunda tanımlanmıştır.
        return Redirect::to($this->returnUrl);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  productImage $productImage
     * @param  product $product
     * @return \Illuminate\Http\jsonResponse
     */
    public function destroy( product $product, productImage $image)
    {
        $image->forceDelete();
        $filePath = $this->fileRepo."/".$image->image_url;
        if (Storage::disk("local")->exists($filePath)) {
            Storage::disk("local")->delete($filePath);
        }
        return response()->json(["message"=>"Done", "id"=>$image->image_id]);
    }
    private function editReturnUrl($id){
        $this->returnUrl = "/productImages/$id/images";
    }
}
