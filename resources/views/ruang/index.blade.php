@extends('layouts.app')

@section('content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Daftar Alat</div>

                    <div class="panel-body">
                        <div class="col-sm-3">
                            <a class="btn btn-block btn-warning" href="" data-toggle="modal" data-target="#create"><i class="fa fa-plus-circle"></i> Tambah Ruang</a>
                        </div>
                        <div class="col-sm-12">
                            <table class="table table-bordered">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Alat</th>
                                    <th>Opsi</th>
                                </tr>
                                @foreach($ruang as $index => $item)
                                    <tr>
                                        <td>{{$index + 1}}</td>
                                        <td>{{$item->nama_ruang}}</td>
                                        <td>
                                            <a class="btn icon btn-success" href="/ruang/updateview/{{$item->ruang_id}}"><i class="fa fa-edit"></i></a>
                                            <a class="btn icon btn-danger" href="/ruang/delete/{{$item->ruang_id}}"><i class="fa fa-close"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Tambah Alat</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-sm-10 col-sm-offset-1">
                                            <form role="form" method="POST" action="/ruang/create">
                                                {!! csrf_field() !!}

                                                @if (count($errors) > 0)
                                                    <div class="alert alert-danger">
                                                        @foreach ($errors->all() as $error)
                                                            {{ $error }}<br/>
                                                        @endforeach
                                                    </div>
                                                @endif

                                                <div class="form-group">
                                                    <label for="ruang">Nama Ruang</label>
                                                    <input type="text" class="form-control" id="ruang" name="nama">
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