<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front;



Route::get('/', 'App\Http\Controllers\Front\Homepage@index')->name('homepage');
Route::get('/kategori/{category}','App\Http\Controllers\Front\Homepage@category')->name('category');
Route::get('/{category}/{slug}','App\Http\Controllers\Front\Homepage@single')->name('single');



