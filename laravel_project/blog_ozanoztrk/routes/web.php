<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'categories'], function () {
    //  /categories geldiyi zaman CategoryControllerde index fonksiyonunu cagir
    Route::get('/', 'App\Http\Controllers\CategoryController@index');
    Route::get('/create', 'App\Http\Controllers\CategoryController@create');
    // /categories/store yazildigi zaman CategoryControllerinde store fonksiyonuna gitsin post ile
    Route::post('/store', 'App\Http\Controllers\CategoryController@store');
    /*
     *  {id} - i burada yaziyoruz once, daha sonra update fonksiyonu icerisinde $id gonderiyoruz
     * /categories/edit/{id} - geldiyi zaman CategoryController icerisindeki edit fonksiyonunu cagir
    */
    Route::get('/edit/{id}', 'App\Http\Controllers\CategoryController@edit');
    // Update zamani formdan post metoduyla requestleri aldigimiz icin post metodunu kullaniyoruz
    Route::post('/update/{id}', 'App\Http\Controllers\CategoryController@update');
    Route::get('/{id}', 'App\Http\Controllers\CategoryController@getPost');
});

Route::group(['prefix' => 'posts'], function (){
   Route::get('/','App\Http\Controllers\PostController@index')->name('posts');
   Route::get('/create','App\Http\Controllers\PostController@create');
   Route::post('/store','App\Http\Controllers\PostController@store');
});


