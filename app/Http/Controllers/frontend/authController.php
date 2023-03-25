<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class authController extends Controller
{
    public function sinInForm():View
    {
        return view("frontend.auth.singIn_form");
    }
    public function sinIn(sinInRequest $request)
    {
        $credentials = $request->only(["email", "password"]);
        $rememberMe = $request->get("remember-me", false);

        if(Auth::attempt($credentials, $rememberMe)){
            return redirect("/");
        }else{
            return redirect()->back()->withErrors([
                "email" => 'Lütfen parolanızı ve şifrenizi kontrol ederek tekrar giriniz.',
                "password" => 'Lütfen parolanızı ve şifrenizi kontrol ederek tekrar giriniz.'
            ]);
        }
    }
    public function sinUpForm()
    {
        return view("frontend.auth.singUp_form");
    }
    public function sinUp()
    {
        
    }
}
