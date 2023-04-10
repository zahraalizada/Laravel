<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class Veritabaniislemleri extends Controller
{
    public function ekle()
    {
       DB::table("bilgiler")->insert([
           "metin" => 'Ak akce kara gun icindir.'

       ]);
    }

    public function  guncelle(){
        DB::table("bilgiler")->where("id",1)->update([
            "metin" => 'Bu 1-ci metin alanimiz guncellenmistir.'

        ]);
    }

    public function  sil(){
        DB::table("bilgiler")->where("id",1)->delete();
    }

    public function  listele(){
//        $veriler=DB::table("bilgiler")->get();
//        foreach ($veriler as $key => $value){
//            echo  $value->id." - ".$value->metin."<br>";
//        }

        $veri=DB::table("bilgiler")->where("id",3)->first();
        echo $veri->metin;
    }
}
