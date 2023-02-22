<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class productRequest extends FormRequest
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
            "name" => "required",
            "price" => "required|numeric",
            "old_price" => "required|numeric|sometimes",
            "lead" => "required|min:10",
            "category_id" => "required",
        ];
    }
    public function messages(){
        return [
            "name.required"=>"İsim alanı zorunludur.",
            "price.required"=>"Fiyat alanı zorunludur.",
            "price.numeric"=>"Fiyat alanı sayısal olması gerekir.",
            "old_price.required"=>"Bu alan zorunludur.",
            "old_price.numeric"=>"Bu alan sayısal olması gerekir.",
            "lead.required"=>"Bu alan zorunludur.",
            "lead.min"=>"Bu alan en az 10 karakterden olmalıdır.",
            "category_id.required"=>"Bu alan zorunludur.",
        ];
    }
}
