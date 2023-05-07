<?php
// Homepage Controller

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\Article;
use App\Models\Category;

class Homepage extends Controller
{
    public  function index(){
        $data['articles'] = Article::orderBy('created_at', 'DESC')->get();// articllari tarixe gore siralayiriq
        $data['categories']=Category::inRandomOrder()->get(); // kategoriyalari random siralayiriq
        return view('front.homepage',$data);
    }
}


