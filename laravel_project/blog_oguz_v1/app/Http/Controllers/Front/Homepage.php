<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class Homepage extends Controller
{
    public function index(){
        /*
         * print_r(Category::all()); - ile Category modelimizdeki tablolarin gelip gelmedini kontrol ediyoruz
         */

        // Category::all() - burada Category modeli icerisindeki butun datalari ceke biliyor demek
//        $data['categories'] =Category::inRandomOrder()->get();
        $categories = Category::all();
        return view('front.homepage',compact('categories'));

    }
}
