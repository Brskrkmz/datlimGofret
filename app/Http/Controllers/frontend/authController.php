<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class authController extends Controller
{
    public function sinInForm():View
    {
        return view(frontend);
    }
    public function sinIn(){}
    public function sinUpForm(){}
    public function sinUp(){}
}
