<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front;



Route::get('/', 'App\Http\Controllers\Front\Homepage@index')->name('homepage');



