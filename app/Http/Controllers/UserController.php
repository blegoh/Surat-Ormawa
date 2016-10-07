<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $user   =   User::all();

        return view('user.index' , ['user'=>$user]);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $user =  new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->nama_ketua = $request->nama_ketua;
        $user->nim = $request->nim;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect('user');
    }

    public function updateview($id) {
        $user = User::find($id);

        return view('user.edit', ['user'=>$user]);
    }

    public function update(Request $request, $id) {
        $user  = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->nama_ketua = $request->nama_ketua;
        $user->nim = $request->nim;
        if($request->password != ""){
            $user->password = bcrypt($request->password);
        }
        $user->update();

        return redirect('/user');
    }

    public function delete($id) {
        User::find($id)->delete();

        return back();
    }
}
