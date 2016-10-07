@extends('layouts.app')

@section('content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Daftar Barang</div>

                    <div class="panel-body">
                        <div class="col-sm-2">
                            <a class="btn btn-block btn-warning" href="" data-toggle="modal" data-target="#modal"><i class="fa fa-plus-circle"></i> Tambah Alat</a>
                        </div>
                        <div class="col-sm-12">
                            <table class="table table-bordered">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Alat</th>
                                    <th>Jumlah</th>
                                    <th>Opsi</th>
                                </tr>
                                <?php $index = 1; ?>
                                @foreach($alat as $item)
                                    <tr>
                                        <td>{{$index++}}</td>
                                        <td>{{$item->nama_alat}}</td>
                                        <td>{{$item->jumlah}}</td>
                                        <td>
                                            <a class="btn icon btn-success" href="/alat/updateview/{{$item->alat_ruang_id}}"><i class="fa fa-edit"></i></a>
                                            <a class="btn icon btn-danger" href="/alat/delete/{{$item->alat_id}}"><i class="fa fa-close"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Tambah Alat</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-sm-10 col-sm-offset-1">
                                            <form role="form" method="POST" action="/alat/create">
                                                {!! csrf_field() !!}

                                                @if (count($errors) > 0)
                                                    <div class="alert alert-danger">
                                                        @foreach ($errors->all() as $error)
                                                            {{ $error }}<br/>
                                                        @endforeach
                                                    </div>
                                                @endif
                                                <div class="form-group">
                                                    <label for="alat">Nama Alat</label>
                                                    <input type="text" class="form-control" id="alat" name="nama">
                                                </div>
                                                <div class="form-group">
                                                    <label for="ruang">Jumlah</label>
                                                    <input type="text" class="form-control" id="ruang" name="jumlah">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Tambah</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection