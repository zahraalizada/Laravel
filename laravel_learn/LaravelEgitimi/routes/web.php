<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Yonet;
use App\Http\Controllers\Formislemleri;
use App\Http\Controllers\Veritabaniislemleri;
use App\Http\Controllers\Modelislemleri;
use App\Http\Controllers\Iletisim;
use App\Http\Controllers\ResimYukle;




Route::get('/', function () {
    return view('welcome');
});


Route::get("/web",[Yonet::class,"site"])->name('myweb');

Route::get("/form",[Formislemleri::class,'gorunum']);

Route::middleware('arakontrol')->post("/form-sonuc",[Formislemleri::class,'sonuc'])->name('sonuc');

Route::get("/ekle",[Veritabaniislemleri::class,'ekle']);
Route::get("/guncelle",[Veritabaniislemleri::class,'guncelle']);
Route::get("/sil",[Veritabaniislemleri::class,'sil']);
Route::get("/listele",[Veritabaniislemleri::class,'listele']);

Route::get("/modelliste",[Modelislemleri::class,"modelliste"]);
Route::get("/modelekle",[Modelislemleri::class,"modelekle"]);
Route::get("/modelguncelle",[Modelislemleri::class,"modelguncelle"]);
Route::get("/modelsil",[Modelislemleri::class,"modelsil"]);

Route::get("/iletisim",[Iletisim::class,"index"]);
Route::post("/iletisim-sonuc",[Iletisim::class,"ekleme"])->name("iletisim-sonuc");

Route::get('/upload', function (){
    return view('upload');
});

Route::post("/resim-ilet",[ResimYukle::class,"resimYukleme"])->name('yukle');

Route::get('/uye', function (){
    return view('uyelik');
});

Route::post('/uye-kayit',[App\Http\Controllers\Uyelikislemleri::class,'uyekayit'])->name('uyekayit');

Route::get('/tema', function (){
    return view('sayfalar.home');
});
Route::get('/galeri', function (){
    return view('sayfalar.galeri ');
});
Route::get('/hizmetler', function (){
    return view('sayfalar.hizmetler ');
});
