<?php

namespace App\Http\Controllers;

use App\Alat;
use App\Lampiran;
use App\Peminjaman;
use App\Peminjaman_Alat;
use App\Peminjaman_Ruang_Alat;
use App\Ruang;
use App\Surat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\App;
use Validator;
use Session;
use DB;
use View;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PeminjamanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
//    Index
    public function index() {
        $pinjam = null;
        $month = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $peminjaman = Peminjaman::where('user_id', Auth::user()->id)
            ->get();
        $ruang      = Ruang::all();
        $alat       = Alat::all();

        $data['peminjaman'] = $peminjaman;
        $data['ruang']      = $ruang;
        $data['alat']       = $alat;

        return view('peminjaman.index', $data);
    }

//    Create View
    public function createview() {
        $peminjaman = Peminjaman::all();
        $ruang      = Ruang::all();
        $alat       = Alat::all();
        $data['peminjaman'] = $peminjaman;
        $data['ruang']      = $ruang;
        $data['alat']       = $alat;

        return view('peminjaman.create', $data);
    }

//    Create Post
    public function create(Request $request) {

        $rule = array(
            'nama_kegiatan'         =>  'required',
            'tanggal_pinjam'        =>  'required|date_format:Y-m-d H:i',
            'tanggal_kembali'       =>  'required|date_format:Y-m-d H:i|after:tanggal_pinjam',
        );

        $this->validate($request, $rule);


        Peminjaman::create([
            'user_id'           =>  $request->ormawa_id,
//            'nomor'             =>  $request->nomor,
//            'panitia_kegiatan'  =>  $request->panitia_kegiatan,
//            'kode_divisi'       =>  $request->kode_divisi,
//            'ketua_panitia'     =>  $request->ketua_panitia,
//            'NIM'               =>  $request->nim,
//            'jumlah_lampiran'   =>  $request->jumlah_lampiran,
            'nama_kegiatan'     =>  $request->nama_kegiatan,
            'tanggal_pinjam'    =>  $request->tanggal_pinjam,
            'tanggal_kembali'   =>  $request->tanggal_kembali,
        ]);

        return redirect('/peminjaman');

    }

//    Edit View
    public function editview($id) {
        $peminjaman     =   Peminjaman::find($id);
        $ruang          =   Ruang::all();
        $alat           =   Alat::all();

        $data['peminjaman'] = $peminjaman;
        $data['ruang']      = $ruang;
        $data['alat']       = $alat;

        return view('peminjaman.edit', $data);
    }

//    Update Peminjaman
    public function update(Request $request, $id) {
        $rule = array(
            'nama_kegiatan'         =>  'required',
            'tanggal_pinjam'        =>  'required|date_format:Y-m-d H:i',
            'tanggal_kembali'       =>  'required|date_format:Y-m-d H:i|after:tanggal_pinjam',
        );

        $this->validate($request, $rule);

        $peminjaman = Peminjaman::find($id);
        $peminjaman->nama_kegiatan  =   $request->nama_kegiatan;
        $peminjaman->tanggal_pinjam =   $request->tanggal_pinjam;
        $peminjaman->tanggal_kembali=   $request->tanggal_kembali;
        $peminjaman->update();

        $peminjaman->alat()->detach();
        $peminjaman->ruang()->detach();

        return back();
    }

//    Tambah Alat
    public function addalat(Request $request, $id) {

        $alat = Alat::find($request->alat_id);

        $peminjaman = Peminjaman::find($id);

        $validator = Validator::make($request->all(), [
            'alat_id'   =>  'required',
            'jumlah'    =>  'required'
        ]);

//        return $peminjaman->sisaAlat($request->alat_id, $peminjaman->tanggal_pinjam, $peminjaman->tanggal_kembali);
        $validator->after(function($validator) use ($peminjaman, $request) {
//            DB::enableQueryLog();
            if ($request->jumlah > $peminjaman->sisaAlat($request->alat_id, $peminjaman->tanggal_pinjam, $peminjaman->tanggal_kembali)) {
                $validator->errors()->add('field', 'Terjadi Kesalahan!');
            }
//            dd(DB::getQueryLog());
        });

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $peminjaman->alat()->attach($alat, ['jumlah' => $request->jumlah]);

        return back();
    }

//    Tambah Ruang
    public function addruang(Request $request, $id) {
//        $rule = array(
//            'ruang_id'   =>  'required',
//        );
//
//        $this->validate($request, $rule);
        $ruang = Ruang::find($request->ruang_id);

        $peminjaman = Peminjaman::find($id);

        $validator = Validator::make($request->all(), [
            'ruang_id'   =>  'required',
        ]);

        $validator->after(function($validator) use ($peminjaman, $request) {
//            DB::enableQueryLog();
            if ($peminjaman->listRuang($request->ruang_id, $peminjaman->tanggal_pinjam, $peminjaman->tanggal_kembali)->count() > 0) {
                $validator->errors()->add('field', 'Something is wrong with this field!');
            }
//            dd(DB::getQueryLog());
        });

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $peminjaman->ruang()->attach($ruang);

        return back();
    }

    public function delalat($peminjaman, $id) {
        Peminjaman_Alat::where(
            ['alat_id', $id],
            ['peminjaman_id', $peminjaman])->delete();

        return back();
    }

    public function delruang($peminjamanid, $ruangid) {
        $peminjaman = Peminjaman::find($peminjamanid);

        $ruang = Ruang::find($ruangid);

        $peminjaman->ruang()->detach($ruang);

        return back();

    }
    public function del($id) {
        $peminjaman = Peminjaman::find($id);
        $peminjaman->delete();
        $peminjaman->ruang()->detach();
        $peminjaman->alat()->detach();

        return back();
    }
}
