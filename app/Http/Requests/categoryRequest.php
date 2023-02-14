<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class categoryRequest extends FormRequest
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
            "slug" => "required|sometimes|unique:App\Models\categry,slug",
        ];
    }
    public function messages(){
        return [
            "name.required"=>"İsim alanı zorunludur.",
            "slug.unique"=>"Girdiğiniz categry adı sistemde kayıtlıdır.",
            "slug.required"=>"Categry alanı zorunludur.",
        ];
    }
}
