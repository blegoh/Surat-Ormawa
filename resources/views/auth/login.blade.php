@extends('layouts.app')

@section('content')
    <div class="col-sm-5">
        <img src="img/mailman.png">
    </div>
    <div class="col-sm-7">
        <h1 class="text-yellow">LOGIN</h1><br>

        <!-- FORM -->
        <form class="form-horizontal" action="/login" method="post">
            {!! csrf_field() !!}

            <div class="row">
                <div class="form-group">
                    <div class="col-sm-10">
                        <span>Username</span>
                        <input type="text"  name="uname" value="{{ old('uname') }}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10">
                        <span>Password</span>
                        <input type="password"  name="password">
                    </div>
                </div>

                <div class="col-sm-2">
                    <input type="submit" class="bg-yellow text-uppercase" value="cek">
                </div>

            </div>
        </form>
    </div>
@endsection
