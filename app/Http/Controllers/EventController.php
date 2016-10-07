<?php

namespace App\Http\Controllers;

use App\Peminjaman;
use Illuminate\Http\Request;

use App\Http\Requests;

class EventController extends Controller
{
    public function event(Request $request)
    {
        $start = $request->from / 1000;
        $end   = $request->to / 1000;
        $events = Peminjaman::whereBetween('tanggal_pinjam',[date('Y-m-d h:i:s', $start),date('Y-m-d h:i:s', $end)])->get();

        $out = [];
        foreach($events as $event) {
            $out[] = [
                'id' => $event->peminjaman_id,
                'title' => $event->nama_kegiatan,
                'url' => '/event/'.$event->peminjaman_id,
                'start' => strtotime($event->tanggal_pinjam) . '000',
                'end' => strtotime($event->tanggal_kembali) .'000'
            ];
        }

        return json_encode(['success' => 1, 'result' => $out]);
    }

    public function show($id)
    {
        $event = Peminjaman::find($id);
        return $event->nama_kegiatan;
    }
}
