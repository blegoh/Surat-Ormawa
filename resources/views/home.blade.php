@extends('layouts.app')

@section('content')
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">Dashboard</div>

            <div class="panel-body">
                <div class="col-sm-12">
                    <table class="table table-bordered">
                        <tr>
                            <th>#</th>
                            <th>Ormawa</th>
                            <th>Nama Kegiatan</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                        </tr>
                        <?php $index = 1 ?>
                        @foreach($peminjaman as $item)
                            <tr>
                                <td>{{$index++}}</td>
                                <td>{{$item->ormawa->name}}</td>
                                <td>{{$item->nama_kegiatan}}</td>
                                <td>{{Carbon\Carbon::parse($item->tanggal_pinjam)->format('d-m-Y')}} | {{Carbon\Carbon::parse($item->tanggal_pinjam)->format('G:i')}}</td>
                                <td>{{Carbon\Carbon::parse($item->tanggal_kembali)->format('d-m-Y')}} | {{Carbon\Carbon::parse($item->tanggal_kembali)->format('G:i')}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
