<?php

namespace App\Http\Controllers;

use App\Alat;
use App\Alat_Ruang;
use App\Ruang;
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
//        $alat = Alat::all();
        $alat = Alat::all();
        $ruang = Ruang::all();

        return view('alat.index', ['alat'=>$alat, 'ruang'=>$ruang]);
    }

    public function create(Request $request) {
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
        $alat = Alat_Ruang::find($id);

        return view('alat.edit', ['alat'=>$alat]);
    }

    public function update(Request $request, $id) {
        $rule = array(
            'nama'      => 'required',
            'jumlah'    => 'required|integer'
        );

        $this->validate($request, $rule);

        Alat_Ruang::find($id)->update([
            'nama_alat' => $request->nama,
            'jumlah'    => $request->jumlah
        ]);

        return redirect('/alat');
    }

    public function delete($id) {
        Alat::find($id)->delete();

        return redirect('/alat');
    }
}
