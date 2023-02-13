<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class userRequest extends FormRequest
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
            "name" => "required|sometimes|min:2",
            "email" => "required|sometimes|email|unique:App\Models\User,email,$user_id",
            "password" => "required|sometimes|string|min:8|confirmed"
        ];
    }
    public function messages(){
        return [
            "name.required"=>"İsim alanı zorunludur.",
            "name.min"=>"İsim alanı en az 2 karakterden oluşur.",
            "email.unique"=>"Girdiğiniz mail adresi sistemde kayıtlıdır.",
            "email.email"=>"Lütfen geçerli bir mail adresi giriniz.",
            "email.required"=>"Mail alanı zorunludur.",
            "password.required"=>"Şifre alanı zorunludur.",
            "password.min"=>"Şifreniz en az 8 karakterden oluşmalıdır.",
            "password.confirmed"=>"Girdiğiniz şifreler aynı değil.",
        ];
    }
    protected function passedValidation(){
        if ($this->request->has("password")) {
           $password = $this->request->get("password");
           $this->request->set("password", Hash::make($password));
        }
    }
}
