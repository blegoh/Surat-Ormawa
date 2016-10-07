@extends('layouts.app')

@section('content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Daftar Peminjaman</div>

                    <div class="panel-body">
                        <div class="col-sm-3">
                            <a class="btn btn-block bg-green margin" href="/peminjaman/create"><i class="fa fa-plus-circle"></i> Buat Peminjaman</a>
                        </div>
                        <div class="col-sm-12">
                            <table class="table table-bordered">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Kegiatan</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Opsi</th>
                                </tr>
                                @foreach($peminjaman as $index => $item)
                                    <tr>
                                        <td>{{$index + 1}}</td>
                                        <td>{{$item->nama_kegiatan}}</td>
                                        <td>{{Carbon\Carbon::parse($item->tanggal_pinjam)->format('d-m-Y')}} | {{Carbon\Carbon::parse($item->tanggal_pinjam)->format('G:i')}}</td>
                                        <td>{{Carbon\Carbon::parse($item->tanggal_kembali)->format('d-m-Y')}} | {{Carbon\Carbon::parse($item->tanggal_kembali)->format('G:i')}}</td>
                                        <td>
                                            <a class="btn icon bg-yellow" href="/peminjaman/edit/{{$item->peminjaman_id}}"><i class="fa fa-edit"></i></a>
                                            <a class="btn icon btn-danger" href="/peminjaman/delete/{{$item->peminjaman_id}}"><i class="fa fa-close"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection