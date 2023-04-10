<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bilgiler;

class Modelislemleri extends Controller
{
    public function modelliste(){
        $bilgi=Bilgiler::where("id",3)->first();

        echo $bilgi->metin;

    }

    public function modelekle(){
        Bilgiler::create([
            "metin" => "Model dosyasindan eklendi.",
        ]);
    }

    public function modelguncelle(){
        Bilgiler::whereId(4)->update([
            "metin" => "Bu alan model ile gunceldir",
        ]);
    }

    public function modelsil(){
        Bilgiler::whereId(4)->delete();
    }
}
