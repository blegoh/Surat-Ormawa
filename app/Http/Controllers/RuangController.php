<?php

namespace App\Http\Controllers;

use App\Ruang;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RuangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $this->authorize('create.ruang');
        $ruang = Ruang::all();

        return view('ruang.index', ['ruang'=>$ruang]);
    }

    public function create(Request $request) {
        $this->authorize('create.ruang');
        $rule = array(
            'nama' => 'required',
        );

        $this->validate($request, $rule);

        Ruang::create([
            'nama_ruang' => $request->nama,
        ]);

//        Session::flash('message', 'Berhasil menambahkan ruang');

        return redirect('/ruang');
    }

    public function updateview($id) {
        $this->authorize('create.ruang');
        $ruang = Ruang::find($id);

        return view('ruang.edit', ['ruang'=>$ruang]);
    }

    public function update(Request $request, $id) {
        $this->authorize('create.ruang');
        $rule = array(
            'nama' => 'required',
        );

        $this->validate($request, $rule);

        Ruang::find($id)->update([
            'nama_ruang' => $request->nama,
        ]);

        return redirect('/ruang');
    }

    public function delete($id) {
        $this->authorize('create.ruang');
        Ruang::find($id)->delete();

        return redirect('/ruang');
    }
}
