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
        $this->authorize('create.user');
        $user   =   User::all();

        return view('user.index' , ['user'=>$user]);
    }

    public function create()
    {
        $this->authorize('create.user');
        return view('user.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create.user');
        $user =  new User();
        $user->unamea = $request->uname;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->nama_ketua = $request->nama_ketua;
        $user->nim = $request->nim;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect('user');
    }

    public function updateview($id) {
        $this->authorize('create.user');
        $user = User::find($id);

        return view('user.edit', ['user'=>$user]);
    }

    public function update(Request $request, $id) {
        $this->authorize('create.user');
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
        $this->authorize('create.user');
        User::find($id)->delete();

        return back();
    }
}
