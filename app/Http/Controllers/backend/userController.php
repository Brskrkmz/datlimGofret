<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\userRequest;
use App\Models\User;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function __construct(){
        $this->returnUrl = "/users";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('backend.users.index',["users" => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.insertForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\userRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(userRequest $request)
    {    
        $user = new User();

        $data = $this->prepare($request, $user->getFillable());
        $user->fill($data);
       // $user->password = Hash::make($sifre);;
        $user->save();

        return Redirect::to($this->returnUrl);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)//birinci parametre (User) model adı, İkinci parametre ($user) route de id gönderilen kısma gelen segment yani /users/{user}/edit
    {
        return view('backend.users.updateForm', ['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\userRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(userRequest $request, User $user)
    {
        $data = $this->prepare($request, $user->getFillable());
        $user->fill($data);

        $user->save();

        return Redirect::to($this->returnUrl);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->forceDelete();
        return Response()->json(["message"=>"Done", "id"=>$user->user_id]);
    }

    public function passwordForm(User $user){

        return view('backend.users.passwordForm', ['user'=>$user]);
    }

    public function changePassword(User $user, userRequest $request){
        $data = $this->prepare($request, $user->getFillable());
        $user->fill($data);
        $user->save();
        return Redirect::to($this->returnUrl);
    }
}
