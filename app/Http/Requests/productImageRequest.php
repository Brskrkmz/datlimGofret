<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class productImageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {   //$user_id = $this->request->get("user_id");
//Güncellemeler sırasında unique olan alanların güncellemede sorun çıkarmaması için id bilgisinin ilgili alanda blirtilmesi gerekir. 
//Bunun için gizli inputtan gelen veriyi alarak unique alanda belirttik.
        return [
            "product_id" => "required",
            "alt" => "required",
            "image_url" => "required|image|mimes:jpg,jpeg,png|sometimes",
        ];
    }
    public function messages(){
        return [
            "product_id.required"=>"Bu alan zorunludur.",
            "alt.required"=>"Bu alanı zorunludur.",
            "price.numeric"=>"Fiyat alanı sayısal olması gerekir.",
            "image_url.required"=>"Bu alan zorunludur.",
            "image_url.image"=>"Bu alan resim dosyası olması gerekir.",
            "image_url.mimes"=>"Sadece .jpg, .jpeg, .png uzantılı dosyalar yüklenebilri",
        ];
    }
}
