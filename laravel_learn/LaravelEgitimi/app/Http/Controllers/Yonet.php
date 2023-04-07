<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Yonet extends Controller
{
   public function site(){
       $data["yazi1"]="PHP Turkiye";
       $data["yazi2"]="Web Sitemize Hosgeldiniz";
       $data["yazi3"]="Hizmetlerimiz";
       $data["yazi4"]="Web tasarim ve yazilim hizmetlerimiz";
       $data["yazi5"]="Bize Ulasin";
       return view('web',$data);
   }
}
