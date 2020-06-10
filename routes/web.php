<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/member/post','MemberController@store');
Route::post('/member/update','MemberController@update');
Route::post('/member/search','MemberController@search');

Route::delete('/member/delete/{id}','MemberController@distroy');
Route::get('/member/get','MemberController@fetchMembers');
Route::get('/initial/data/get','MemberController@index');
