<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/', 'UserController@main');

// berita
Route::get('/berita','UserController@berita');
Route::get('/berita/{id}','UserController@detail');

// Profile
Route::get('/profile/struktur', function () { //structure
    return view('/blogs/profile/struktur');
});
Route::get('/profile/geografis','UserController@geografis' );
Route::get('/profile/iklim', 'UserController@iklim'); //iklim

Route::post('/profile/iklim', 'UserController@filter_iklim'); //filter iklim

Route::get('/profile/desa', function (){ //desa
    return view('/blogs/profile/desa');
});
Route::post('/profile/desa', 'UserController@filter_iklim'); //

Route::get('/profile/penduduk', function (){ //penduduk
    return view('/blogs/profile/penduduk');
});
Route::post('/profile/penduduk', 'UserController@filter_iklim');
// search
// Route::get('/search/result','UserController@result');
Route::get('/search','UserController@search');
Route::post('/search','UserController@search1');

//admin
Route::get('/admin', 'HomeController@index')->name('admin');
Route::get('/admin/add', 'HomeController@create');
Route::post('/admin', 'HomeController@add');

Route::put('/admin/{id}', 'HomeController@update');
Route::get('/admin/{id}', 'HomeController@preview');
Route::get('/admin/{id}/edit', 'HomeController@edit');
Route::delete('/admin/{id}', 'HomeController@delete');
