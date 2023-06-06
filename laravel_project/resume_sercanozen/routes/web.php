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
    Route::post('/education-change-status','App\Http\Controllers\EducationController@changeStatus')->name('admin.education.changeStatus');
    Route::post('/education-delete','App\Http\Controllers\EducationController@delete')->name('admin.education.delete');
    Route::get('/education-add','App\Http\Controllers\EducationController@addShow')->name('admin.education.add');
    Route::post('/education-add','App\Http\Controllers\EducationController@add');


    // Experience routes
    Route::get('/experience-list','App\Http\Controllers\ExperienceController@list')->name('admin.experience.list');
    Route::post('/experience-change-status','App\Http\Controllers\ExperienceController@changeStatus')->name('admin.experience.changeStatus');
    Route::post('/experience-change-active','App\Http\Controllers\ExperienceController@activeStatus')->name('admin.experience.activeStatus');
    Route::post('/experience-delete','App\Http\Controllers\ExperienceController@delete')->name('admin.experience.delete');
    Route::get('/experience-add','App\Http\Controllers\ExperienceController@addShow')->name('admin.experience.add');
    Route::post('/experience-add','App\Http\Controllers\ExperienceController@add');

});








Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
