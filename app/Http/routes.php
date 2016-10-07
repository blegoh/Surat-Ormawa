<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {

    Route::get('api/events','EventController@event');
    Route::get('/event/{id}','EventController@show');

    Route::auth();

    Route::get('/home', 'HomeController@index');

    Route::get('/alat', 'AlatController@index');
    Route::post('/alat/create', 'AlatController@create');
    Route::get('/alat/updateview/{id}', 'AlatController@updateview');
    Route::post('/alat/update/{id}', 'AlatController@update');
    Route::get('/alat/delete/{id}', 'AlatController@delete');

    Route::get('/ruang', 'RuangController@index');
    Route::post('/ruang/create', 'RuangController@create');
    Route::get('/ruang/updateview/{id}', 'RuangController@updateview');
    Route::post('/ruang/update/{id}', 'RuangController@update');
    Route::get('/ruang/delete/{id}', 'RuangController@delete');

    Route::get('/user', 'UserController@index');
    Route::get('/user/create', 'UserController@create');
    Route::post('/user','UserController@store');
    Route::get('/user/updateview/{id}', 'UserController@updateview');
    Route::post('/user/update/{id}', 'UserController@update');
    Route::get('/user/delete/{id}', 'UserController@delete');

    Route::get('/peminjaman', 'PeminjamanController@index');
    Route::get('/peminjaman/create', 'PeminjamanController@createview');
    Route::post('/peminjaman/add', 'PeminjamanController@create');
    Route::get('/peminjaman/edit/{id}', 'PeminjamanController@editview');
    Route::post('/peminjaman/update/{id}', 'PeminjamanController@update');
    Route::get('/peminjaman/delete/{id}', 'PeminjamanController@del');
    Route::get('/deletealat/{id}', 'PeminjamanController@delalat');
    Route::get('/deleteruang/{idpeminjaman}/{idruang}', 'PeminjamanController@delruang');

    Route::post('/peminjaman/{id}/addalat', 'PeminjamanController@addalat');
    Route::post('/peminjaman/{id}/addruang', 'PeminjamanController@addruang');

    Route::get('/cetak-peminjaman/{id}', 'PeminjamanController@cetak');
    Route::post('/addsurat', 'PeminjamanController@addsurat');
    Route::get('peminjaman/cetak/{id}', function($id) {
        $today = Carbon\Carbon::now();

        $name = 'Surat Peminjaman Ruang dan Alat.pdf';
        $peminjaman = \App\Peminjaman::find($id);
        $data['peminjaman'] = $peminjaman;
        $data['today']      = $today->format('j F Y');
        $pdf = PDF::loadView('peminjaman.surat', $data)->setPaper('f4')->setOrientation('potrait');

        return $pdf->stream($name);
    });
});
