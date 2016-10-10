<?php

namespace App\Http\Controllers;

use App\Alat;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;

class AlatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() {
        $this->authorize('create.alat');
        $alat = Alat::all();

        return view('alat.index', compact('alat'));
    }

    public function create(Request $request) {
        $this->authorize('create.alat');
        $rule = array(
            'nama' => 'required',
            'jumlah' => 'required'
        );

        $this->validate($request, $rule);

        Alat::create([
            'nama'   =>  $request->nama,
            'jumlah'        =>  $request->jumlah
        ]);

        Session::flash('message', 'Berhasil menambahkan alat');

        return redirect('/alat');
    }

    public function updateview($id) {
        $this->authorize('create.alat');
        $alat = Alat::find($id);

        return view('alat.edit', ['alat'=>$alat]);
    }

    public function update(Request $request, $id) {
        $this->authorize('create.alat');
        $rule = array(
            'nama'      => 'required',
            'jumlah'    => 'required|integer'
        );

        $this->validate($request, $rule);

        Alat::find($id)->update([
            'nama_alat' => $request->nama,
            'jumlah'    => $request->jumlah
        ]);

        return redirect('/alat');
    }

    public function delete($id) {
        $this->authorize('create.alat');
        Alat::find($id)->delete();

        return redirect('/alat');
    }
}
