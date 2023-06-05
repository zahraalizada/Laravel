<?php

use Illuminate\Support\Facades\Route;


Route::get('/','App\Http\Controllers\FrontController@index')->name('index');
Route::get('/resume','App\Http\Controllers\FrontController@resume')->name('resume');
Route::get('/portfolio','App\Http\Controllers\FrontController@portfolio')->name('portfolio');
Route::get('/blog','App\Http\Controllers\FrontController@blog')->name('blog');
Route::get('/contact','App\Http\Controllers\FrontController@contact')->name('contact');


//Route::get('/login',function (){ return view('admin.login'); })->name('admin.login');

Route::prefix('admin')->middleware('auth')->group(function(){
    Route::get('/','App\Http\Controllers\AdminController@index')->name('admin.index');
    Route::get('/education-list','App\Http\Controllers\EducationController@list')->name('admin.education.list');
    Route::get('/education-add','App\Http\Controllers\EducationController@addShow')->name('admin.education.add');
    Route::post('/education-add','App\Http\Controllers\EducationController@add');
});








Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
