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
Route::get('/tools', 'page@tools')->name('tools');
Route::get('/tools/pilreksa', 'page@indexPilReksa')->name('pilreksa');
Route::post('/robopilreksa', 'page@robopilreksa')->name('pilreksa');
Route::get('/tools/b', 'page@tools');



Route::get('/contact', 'page@contact')->name('contact');
Route::get('/blog', 'page@blog')->name('blog');
Route::get('/blog/detail/{id}', 'page@blogDetail')->name('detail');
Route::get('/blog/buat', 'page@form')->name('form');
Route::post('/postBuat', 'page@createBlog')->name('buat');
Route::post('/postUpdate', 'page@updateBlog')->name('update');

//another page

