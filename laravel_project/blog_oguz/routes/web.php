<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front;


/* ------------------------------------------------
 * Backend Routes
 ------------------------------------------------- */

// Group route kullanimi
Route::prefix('admin')->name('admin.')->middleware('isLogin')->group(function () {
    Route::get('giris', 'App\Http\Controllers\Back\AuthController@login')->name('login');
    Route::post('giris', 'App\Http\Controllers\Back\AuthController@loginPost')->name('login.post');
});

// Group route kullanimi middlware ile
Route::prefix('admin')->name('admin.')->middleware('isAdmin')->group(function () {
    Route::get('panel', 'App\Http\Controllers\Back\Dashboard@index')->name('dashboard');
    // Makale roots
    Route::get('makaleler/silinenler','App\Http\Controllers\Back\ArticleController@trashed')->name('trashed.article');
    Route::resource('makaleler', 'App\Http\Controllers\Back\ArticleController');
    Route::get('/switch','App\Http\Controllers\Back\ArticleController@switch')->name('switch');
    Route::get('/deletearticle/{id}','App\Http\Controllers\Back\ArticleController@delete')->name('delete.article');
    Route::get('/harddeletearticle/{id}','App\Http\Controllers\Back\ArticleController@hardDelete')->name('hard.delete.article');
    Route::get('/recoverarticle/{id}','App\Http\Controllers\Back\ArticleController@recover')->name('recover.article');

    // Categories roots
    Route::get('/kategoriler','App\Http\Controllers\Back\CategoryController@index')->name('category.index');
    Route::post('/kategoriler/create','App\Http\Controllers\Back\CategoryController@create')->name('category.create');
    Route::post('/kategoriler/update','App\Http\Controllers\Back\CategoryController@update')->name('category.update');
    Route::post('/kategoriler/delete','App\Http\Controllers\Back\CategoryController@delete')->name('category.delete');
    Route::get('/category/status','App\Http\Controllers\Back\CategoryController@switch')->name('category.switch');
    Route::get('/category/getData','App\Http\Controllers\Back\CategoryController@getData')->name('category.getdata');


    Route::get('cikis', 'App\Http\Controllers\Back\AuthController@logout')->name('logout');
});


/* ------------------------------------------------
 * Frontend Routes
 ------------------------------------------------- */

Route::get('/', 'App\Http\Controllers\Front\Homepage@index')->name('homepage');
Route::get('/iletisim', 'App\Http\Controllers\Front\Homepage@contact')->name('contact');
Route::post('/iletisim', 'App\Http\Controllers\Front\Homepage@contactpost')->name('contact.post');
Route::get('/kategori/{category}', 'App\Http\Controllers\Front\Homepage@category')->name('category');
Route::get('/{category}/{slug}', 'App\Http\Controllers\Front\Homepage@single')->name('single');
Route::get('/{sayfa}', 'App\Http\Controllers\Front\Homepage@page')->name('page');




