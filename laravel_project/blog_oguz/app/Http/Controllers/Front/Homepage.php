<?php
// Homepage Controller

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use http\Message;
use Illuminate\Http\Request;
use Validator;

// Models
use App\Models\Article;
use App\Models\Category;
use App\Models\Page;
use App\Models\Contact;


class Homepage extends Controller
{
    public function __construct()
    {
        //share ile datayi tum viewlere gonderiyoruz
        view()->share('pages', Page::orderBy('order', 'ASC')->get());
        view()->share('categories', Category::inRandomOrder()->get());
    }

    public function index()
    {
        $data['articles'] = Article::orderBy('created_at', 'DESC')->paginate(3);// articllari tarixe gore siralayiriq, paginate ile seyfeleyirik
        return view('front.homepage', $data);
    }

    public function single($category, $slug)
    {
        $category = Category::whereSlug($category)->first() ?? abort(403, 'Boyle bir kategori bulunamadi');
        $article = Article::whereSlug($slug)->whereCategoryId($category->id)->first() ?? abort(403, 'Boyle bir yazi bulunamadi');
        $article->increment('hit'); //makale kac kere tiklandi hesapla
        $data['article'] = $article;
        return view('front.single', $data);
    }

    public function category($slug)
    {
        $category = Category::whereSlug($slug)->first() ?? abort(403, 'Boyle bir kategori bulunamadi');
        $data['category'] = $category;
        $data['articles'] = Article::where('category_id', $category->id)->orderBy('created_at', 'DESC')->paginate(1);
        return view('front.category', $data);

    }

    public function page($slug)
    {
        $page = Page::whereSlug($slug)->first() ?? abort(403, 'Boyle bir sayfa bulunamadi');
        $data['page'] = $page;
        return view('front.page', $data);
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function contactpost(Request $request)
    { // post-dan gelen datalari request kutuphane ile aliyoruz

        $rules = [
            'name' => 'required|min:5',
            'email' => 'required|email',
            'topic' => 'required',
            'message' => 'required|min:10'
        ];
        $validate = Validator::make($request->post(), $rules);

        if($validate->fails()){
            return redirect()->route('contact')->withErrors($validate)->withInput();
        }

        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->topic = $request->topic;
        $contact->message = $request->message;
        $contact->save();
        return redirect()->route('contact')->with('success', 'Mesajiniz basariyla iletildi. Tesekkur ederiz!');
    }


}


