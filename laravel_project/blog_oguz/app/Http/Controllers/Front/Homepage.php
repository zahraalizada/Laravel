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
        $data['articles'] = Article::orderBy('created_at', 'DESC')->paginate(3);// articllari tarixe gore siralayiriq, paginate ile seyfeleyirik
//        $data['articles']->withPath(url('yazilar/sayfa'));
        $data['categories']=Category::inRandomOrder()->get(); // kategoriyalari random siralayiriq
        return view('front.homepage',$data);
    }

    public function single($category,$slug){
        $category= Category::whereSlug($category)->first() ?? abort(403,'Boyle bir kategori bulunamadi');
        $article=Article::whereSlug($slug)->whereCategoryId($category->id)->first() ?? abort(403,'Boyle bir yazi bulunamadi');
        $article->increment('hit'); //makale kac kere tiklandi hesapla
        $data['article'] =$article;

        $data['categories']=Category::inRandomOrder()->get(); // kategoriyalari random siralayiriq
        return view('front.single',$data);
    }


    public function category($slug){
        $category= Category::whereSlug($slug)->first() ?? abort(403,'Boyle bir kategori bulunamadi');
        $data['category']=$category;
        $data['articles']=Article::where('category_id',$category->id)->orderBy('created_at','DESC')->paginate(1);
        $data['categories']=Category::inRandomOrder()->get(); // kategoriyalari random siralayiriq

        return view('front.category',$data);

    }
}


