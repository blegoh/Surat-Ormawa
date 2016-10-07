@extends('layouts.app')

@section('content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Detail Peminjaman
                    </div>
                    <div class="panel-body">
                        <a href="" class="btn btn-warning">Cetak Surat Peminjaman</a>
                        <form role="form" method="POST" action="/peminjaman/add">

                            {!! csrf_field() !!}

                            <input type="hidden" name="peminjaman_id" value="{{$peminjaman->peminjaman_id}}">
                            <input type="hidden" name="ormawa_id" value="{{$peminjaman->ormawa->ormawa_id}}">

                            <table class="table">

                                <tr>
                                    <th>Nomor Surat</th>
                                    <td>:</td>
                                    <td><input type="text" class="form-control" name="nomor_kegiatan" value="{{$peminjaman->nama_kegiatan}}"></td>
                                </tr>
                                <tr>
                                    <th>Panitia Kegiatan</th>
                                    <td>:</td>
                                    <td><input type="text" class="form-control" name="tanggal_pinjam" value="{{$peminjaman->tanggal_pinjam}}"></td>
                                </tr>
                                <tr>
                                    <th>Kode Divisi</th>
                                    <td>:</td>
                                    <td><input type="text" class="form-control" name="tanggal_pinjam" value="{{$peminjaman->lama}}"></td>
                                </tr>
                                <tr>
                                    <th>Periode Jabatan</th>
                                    <td>:</td>
                                    <td><input type="text" class="form-control" name="tanggal_pinjam" value="{{$peminjaman->tanggal_kembali}}" readonly></td>
                                </tr>
                            </table>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection