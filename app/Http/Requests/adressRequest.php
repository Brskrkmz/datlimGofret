<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class adressRequest extends FormRequest
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
    {   $user_id = $this->request->get("user_id");
//Güncellemeler sırasında unique olan alanların güncellemede sorun çıkarmaması için id bilgisinin ilgili alanda blirtilmesi gerekir. 
//Bunun için gizli inputtan gelen veriyi alarak unique alanda belirttik.
        return [
            "user_id" => "required|numeric",
            "city" => "required|min:3",
            "district" => "required|min:3",
            "zipcode" => "required|min:3|numeric",
            "adress" => "required|min:30",
        ];
    }
    public function messages(){
        return [
            "user_id.required"=>"Id alanı sayısal olması zorunludur.",
            "name.min"=>"İsim alanı en az 2 karakterden oluşur.",
            "zipcode.required"=>"Posta kodu alanı zorunludur.",
            "zipcode.min"=>"Posta kodu alanı en az 3 karakter olmalıdır.",
            "zipcode.numeric"=>"Posta kodu alanı sayısal olması zorunludur.",
            "city.required"=>"Şehir alanı zorunludur.",
            "district.required"=>"Semt/İlçe alanı zorunludur.",
            "district.min"=>"Semt/İlçe en az 3 karakterden oluşmalıdır.",
            "city.min"=>"Şehir en az 3 karakterden oluşmalıdır.",
            "adress.min"=>"Şehir en az 30 karakterden oluşmalıdır.",
            "adress.required"=>"Adres kodu zorunludur.",
        ];
    }
}
