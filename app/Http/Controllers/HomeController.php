<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Peminjaman;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $peminjaman = Peminjaman::all();

//        foreach($peminjaman as $item) {
//            $pinjam  = Carbon::createFromDate($item->tanggal_pinjam);
//            $kembali = $item->tanggal_kembali;
//
//            $tgl    = $pinjam->format('j F Y g:i');
//
//        }

        $data['peminjaman'] = $peminjaman;
//        $data['pinjam']     = $tgl;
        return view('home', $data);
    }
}
