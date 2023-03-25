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
    public function signIn(sinInRequest $request)
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
    public function signUpForm()
    {
        return view("frontend.auth.signUp_form");
    }
    public function signUp()
    {
        $user = new user;

        $data = $this->prepare($request, $user->getFillable());
        $data["is_active"] = true;
        $user->fill($data);
        $user->save();

        return Redirect::to('/giris');
    }
    public function logOut()
    {
        Auth::logOut();
        return redirect("/");
    }
}


?>