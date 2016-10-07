@extends('layouts.app')

@section('content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Daftar Pengguna</div>

                    <div class="panel-body">
                        <div class="col-sm-2">
                            <a class="btn btn-block btn-warning" href="/user/create"><i class="fa fa-plus-circle"></i> Tambah Alat</a>
                        </div>
                        <div class="col-sm-12">
                            <table class="table table-bordered">
                                <tr>
                                    <th>#</th>
                                    <th>Nama User</th>
                                    <th>Email</th>
                                    <th>Nama Ketua</th>
                                    <th>NIM</th>
                                    <th>Opsi</th>
                                </tr>
                                <?php $index = 1; ?>
                                @foreach($user as $item)
                                    <tr>
                                        <td>{{$index++}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->nama_ketua}}</td>
                                        <td>{{$item->nim}}</td>
                                        <td>
                                            <a class="btn icon btn-success" href="/user/updateview/{{$item->id}}"><i class="fa fa-edit"></i></a>
                                            <a class="btn icon btn-danger" href="/user/delete/{{$item->id}}"><i class="fa fa-close"></i></a>
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