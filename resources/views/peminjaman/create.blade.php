@extends('layouts.app')

@section('content')
    <div class="col-sm-10 col-sm-offset-1">
        <form role="form" method="POST" action="/peminjaman/add">
            {!! csrf_field() !!}

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br/>
                    @endforeach
                </div>
            @endif

            <input type="hidden" name="ormawa_id" value="{{Auth::user()->id}}">


            <div class="form-group">
                <label for="kegiatan">Nama Kegiatan</label>
                <input type="text" class="form-control" id="kegiatan" name="nama_kegiatan">
            </div>

            <div class="form-group">
                <label for="pinjam">Tanggal Pinjam</label>
                <div class='input-group date datetimepicker1'>
                    <input id="pinjam" type='text' class="form-control" name="tanggal_pinjam">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>

            <div class="form-group">
                <label for="kembali">Tanggal Kembali</label>
                <div class='input-group date datetimepicker1'>
                    <input id="kembali" type='text' class="form-control" name="tanggal_kembali">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>


            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>

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