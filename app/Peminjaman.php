<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Peminjaman extends Model
{
    protected $table = 'peminjaman';

    protected $primaryKey = 'peminjaman_id';

    public $fillable = ['user_id', 'nomor', 'panitia_kegiatan', 'kode_divisi', 'jumlah_lampiran', 'ketua_panitia', 'nim', 'nama_kegiatan', 'tanggal_pinjam', 'tanggal_kembali'];

    public function ormawa() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function alat() {
        return $this->belongsToMany(Alat::class, 'peminjaman_alat', 'peminjaman_id', 'alat_id')->withPivot('jumlah');
    }

    public function ruang() {
        return $this->belongsToMany(Ruang::class, 'peminjaman_ruang', 'peminjaman_id', 'ruang_id');
    }

    public function scopeListRuang($query, $ruang_id, $pinjam, $kembali) {
        return $query->from('peminjaman_ruang as pr')
            ->join('peminjaman as p', 'pr.peminjaman_id', '=', 'p.peminjaman_id')
            ->where('ruang_id', $ruang_id)
            ->where('tanggal_kembali', '>=', $pinjam)
            ->where('tanggal_pinjam', '<=', $kembali);
    }

    public function scopeListAlat($query, $alat_id, $pinjam, $kembali) {
        return $query->from('peminjaman_alat as a')
            ->join('peminjaman as p', 'a.peminjaman_id', '=', 'p.peminjaman_id')
            ->where('alat_id', $alat_id)
            ->where('tanggal_kembali', '>=', $pinjam)
            ->where('tanggal_pinjam', '<=', $kembali);
    }

    public function sisaAlat($alat_id, $pinjam, $kembali)
    {
        $alat = Alat::find($alat_id);
        $realCount = $alat->jumlah;
        $jumlahYgDipinjam = $this->listAlat($alat_id, $pinjam, $kembali)->sum('jumlah');;
        return $realCount - $jumlahYgDipinjam;
    }

//    public function attachAlat($alat) {
//        $alat = Alat::where('nama_alat', $alat)->first();
//
//        return $this->alat()->attach();
//    }
//
//    public function attachRuang($ruangid) {
//        $ruang = Ruang::where('ruang_id', $ruangid)->first();
//
//        return $this->ruang()->attach($ruang);
//    }

}
