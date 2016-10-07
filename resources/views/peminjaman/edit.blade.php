@extends('layouts.app')

@section('content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Detail Peminjaman
                    </div>
                    <div class="panel-body">
                        <div class="col-sm-12">
                            {{--<a data-toggle="modal" href="/peminjaman/cetak/{{$peminjaman->peminjaman_id}}" class="btn btn-warning margin">Cetak Surat Peminjaman</a>--}}
                            <form role="form" method="POST" action="/peminjaman/update/{{$peminjaman->peminjaman_id}}}">

                                {!! csrf_field() !!}

                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            {{ $error }}<br/>
                                        @endforeach
                                    </div>
                                @endif

                                <table class="table">
                                    <tr>
                                        <th><label for="nama">Nama Kegiatan</label></th>
                                        <td>:</td>
                                        <td><input id="nama" type="text" class="form-control" name="nama_kegiatan" value="{{$peminjaman->nama_kegiatan}}"></td>
                                    </tr>
                                    <tr>
                                        <th><label for="pinjam">Tanggal Pinjam</label></th>
                                        <td>:</td>
                                        <td>
                                            <div class='input-group date datetimepicker1'>
                                                <input id="pinjam" type='text' class="form-control" name="tanggal_pinjam" value="{{$peminjaman->tanggal_pinjam}}">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><label for="kembali">Tanggal Kembali</label></th>
                                        <td>:</td>
                                        <td>
                                            <div class='input-group date datetimepicker1'>
                                                <input id="kembali" type='text' class="form-control" name="tanggal_kembali" value="{{$peminjaman->tanggal_kembali}}">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                            </div>
                                        </td>
                                    </tr>


                                </table>
                                <button class="btn btn-default btn-danger col-sm-3" type="submit">Update</button>
                            </form>
                        </div>

                        <div class="col-sm-12">
                            <a data-toggle="modal" href="#modal1" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Alat</a>
                            <a data-toggle="modal" href="#modal2" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Ruang</a>
                            <table class="table table-bordered">
                                <tr>
                                    <th>#</th>
                                    <th>Alat</th>
                                    <th>Jumlah</th>
                                    <th>Opsi</th>
                                </tr>
                                <?php $index = 1; ?>
                                @foreach($peminjaman->alat as $item)
                                    <tr>
                                        <td>{{$index++}}</td>
                                        <td>{{$item->nama_alat}}</td>
                                        <td>{{$item->pivot->jumlah}}</td>
                                        <td>
                                            <a class="btn icon btn-danger" href="/deletealat/{{$item->alat_id}}"><i class="fa fa-close"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                @foreach($peminjaman->ruang as $item)
                                    <tr>
                                        <td>{{$index++}}</td>
                                        <td>{{$item->nama_ruang}}</td>
                                        <td>1</td>
                                        <td>
                                            <a class="btn icon btn-danger" href="/deleteruang/{{$peminjaman->peminjaman_id}}/{{$item->ruang_id }}"><i class="fa fa-close"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tambah Alat -->
            <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Tambahkan Lampiran Alat</h4>
                        </div>
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <form class="form-horizontal" action="/peminjaman/{{$peminjaman->peminjaman_id}}/addalat" method="post">
                                    {!! csrf_field() !!}
                                    <div class="modal-body">

                                        <input type="hidden" name="peminjaman" value="{{$peminjaman->peminjaman_id}}">

                                        <div class="form-group">
                                            <label for="alat">Nomor Surat</label>
                                            <select id="alat" name="alat_id" class="form-control">
                                                <option value="0">Pilih Alat</option>
                                                @foreach($alat as $item)
                                                    <option value="{{$item->alat_id}}">{{$item->nama_alat}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="jumlah">Jumlah</label>
                                            <input id="jumlah" type="text" name="jumlah" class="form-control">
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-warning" type="submit"> Submit </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tambah Ruang -->
            <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Tambahkan Lampiran</h4>
                        </div>
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <form class="form-horizontal" action="/peminjaman/{{$peminjaman->peminjaman_id}}/addruang" method="post">
                                    {!! csrf_field() !!}
                                    <div class="modal-body">

                                        <input type="hidden" name="peminjaman" value="{{$peminjaman->peminjaman_id}}">

                                        <div class="form-group">
                                            <label for="alat">Ruang</label>
                                            <select id="alat" name="ruang_id" class="form-control">
                                                <option value="0">Pilih Ruang</option>
                                                @foreach($ruang as $item)
                                                    <option value="{{$item->ruang_id}}">{{$item->nama_ruang}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <a class="btn btn-default" data-dismiss="modal" type="button"> Close </a>
                                        <button class="btn btn-warning" type="submit"> Submit </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Cetak Surat Peminjaman Alat dan Ruang</h4>
                        </div>
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <form class="form-horizontal" action="" method="post">
                                    {!! csrf_field() !!}
                                    <div class="modal-body">

                                        <input type="hidden" name="peminjaman" value="{{$peminjaman->peminjaman_id}}">

                                        <div class="form-group">
                                            <label for="alat">Ruang</label>
                                            <div class="col-sm-2">
                                                <input type="text" name="">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <a class="btn btn-default" data-dismiss="modal" type="button"> Close </a>
                                        <button class="btn btn-warning" type="submit"> Submit </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('script')
    <script>
        $(function () {
            $('.datetimepicker1').datetimepicker({
                format: 'YYYY-MM-DD HH:mm'
            });
        });

    </script>
@endsection