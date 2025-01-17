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

// Route::get('/', function () {
//     return view('welcome');
// });

//page static controller
Route::get('/', 'page@index')->name('homepage');
Route::get('/about', 'page@about')->name('about');
Route::get('/contact', 'page@contact')->name('contact');

//profil
Route::get('/profil', 'Profil@profil')->name('profil');
Route::get('/profil/edit', 'Profil@profiledit');
Route::post('/profil/{id}', 'Profil@profilupdate');

//newsletter
Route::get('/buatnewsletter', 'page@buatnewsletter');
Route::get('/aktifkan/{aktivasi}', 'page@aktivasi');

//alat
Route::get('/alat', 'alat@tools')->name('tools');
Route::get('/saranalatredirect', 'alat@saranalatredirect');
Route::get('/upvoteredirect', 'alat@upvoteredirect');
Route::post('/buatalat', 'alat@actionBuat');
Route::post('/upvote', 'alat@actionUpvote');
Route::get('/getdatasaran', 'alat@getdatasaran');
Route::post('/ubahsaranalat/{id}', 'alat@ubahsaranalat');
Route::get('/deletesaran/{id}', 'alat@deletesaran');

//alat pireksa
Route::get('/alat/pilreksa', 'alat@indexPilReksa')->name('pilreksa');
Route::post('/robopilreksa', 'alat@robopilreksa');
//alat pilham
Route::get('/alat/pilham', 'alat@indexPilHam')->name('pilreksa');
Route::post('/robopilham', 'alat@robopilham');
//alat profsiko
Route::get('/alat/profsiko', 'alat@indexProfSiko')->name('profsiko');
Route::post('/roboprofsiko', 'alat@roboprofsiko');

//blog
Route::get('/blog', 'page@blog')->name('blog');
Route::get('/blog/detail/{id}', 'page@blogDetail')->name('detail');
Route::get('/blog/buat', 'page@form')->name('form');
Route::post('/postBuat', 'page@createBlog')->name('buat');
Route::post('/postUpdate', 'page@updateBlog')->name('update');

//diskusi
Route::get('/diskusi', 'diskusi@indexDiskusi')->name('diskusi');
Route::post('/buatdiskusi', 'diskusi@actionBuat');
Route::post('/komen', 'diskusi@actionKirim');


//auth
Auth::routes();
Route::get('redirect/{driver}', 'Auth\LoginController@redirectToProvider')->name('login.provider');
Route::get('{driver}/callback', 'Auth\LoginController@handleProviderCallback')->name('login.callback');

Route::get('/home', function () {
        return redirect('/');
    });