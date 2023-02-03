<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\adressRequest;
use App\Models\Adress;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Contracts\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AdressController extends Controller
{
    public function __construct(){
        $this->returnUrl = "/users/{}/adress";
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(User $user)
    {
        $addrs = $user->adress;
        return view('backend.adresses.index',["addrs" => $addrs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(User $user): View
    {
        return view('backend.adresses.insertForm', ["user" => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  adressRequest  $request
     * @return Redirect
     */
    public function store(User $user, adressRequest $request): RedirectResponse
    {
        $addrs = new Adress();

        $data = $this->prepare($request, $addrs->getFillable());
        $addrs->fill($data);
        $addrs->save();

        $this->editReturnUrl($user->user_id);

        return Redirect::to($this->returnUrl);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return View
     */
    public function edit(User $user, Adress $adres): View
    {
        return view('backend.adresses.updateForm', ['user'=>$user, "addrs" => $adres]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User $user
     * @return Redirect
     */
    public function update(Request $request, User $user, Adress $addrs): RedirectResponse
    {
        $data = $this->prepare($request, $addrs->getFillable());
        $addrs->fill($data);

        $addrs->save();

        $this->editReturnUrl($user->user_id);

        return Redirect::to($this->returnUrl);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Adress $addrs
     * @return \Illuminate\Http\jsonResponse
     */
    public function destroy(Adress $addrs)
    {
        $addrs->forceDelete();
        return Response()->json(["message"=>"Done", "id"=>$addrs->adress_id]);
    }
    private function editReturnUrl($id){
        $this->returnUrl = "/users/$id/adress";
    }
}
