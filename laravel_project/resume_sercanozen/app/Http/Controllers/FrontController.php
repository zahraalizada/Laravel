<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Experience;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        /*
         *  Education Modelini kullanarak query ile verileri aliyoruz,
         *  where komutu ile statusu 1 olan rowlari alicagimizi belirtiyoruz,
         *  select ile rowdaki hangi columnlari alacagimizi belirtiyoruz
         *  get komutu ile verileri getirmesini soyluyoruz
         *
         * $educationList = Education::query()->where('status',1)->select('education_date','university_name','university_branch','description')->get();
         */

        $educationList = Education::query()->statusActive()->select('education_date','university_name','university_branch','description')->orderBy('order','ASC')->get();

        $experienceList = Experience::query()->where('status',1)->select('date','task_name','company_name','description')->orderBy('order','ASC')->get();

        return view('pages.index',compact('educationList','experienceList'));
    }
    public function resume(){
        return view('pages.resume');

    }
    public function portfolio(){
        return view('pages.portfolio');

    }
    public function blog(){
        return view('pages.blog');
    }
    public function contact(){
        return view('pages.contact');
    }
}
