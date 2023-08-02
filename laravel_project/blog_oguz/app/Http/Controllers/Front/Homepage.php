<?php
// Homepage Controller

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use http\Message;
use Illuminate\Http\Request;
use Mail;
use Validator;

// Models
use App\Models\Article;
use App\Models\Category;
use App\Models\Page;
use App\Models\Contact;
use App\Models\Config;


class Homepage extends Controller
{
    public function __construct()
    {
        if (Config::find(1)->active == 0) {
            return redirect()->to('site-bakimda')->send();
        }
        //share ile datayi tum viewlere gonderiyoruz
        view()->share('pages', Page::where('status', 1)->orderBy('order', 'ASC')->get());
        view()->share('categories', Category::where('status', 1)->inRandomOrder()->get());
    }

    public function index()
    {
        $data['articles'] = Article::with('getCategory')->where('status', 1)->whereHas('getCategory', function ($query) {
            $query->where('status', 1);
        })->orderBy('created_at', 'DESC')->paginate(5);// articllari tarixe gore siralayiriq, paginate ile seyfeleyirik

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
        $data['articles'] = Article::where('category_id', $category->id)->where('status', 1)->orderBy('created_at', 'DESC')->paginate(1);
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

        if ($validate->fails()) {
            return redirect()->route('contact')->withErrors($validate)->withInput();
        }

//        Mail::send([],[],function ($message) use($request){
//            $message->from('iletisim@blogsitesi.com','Blog sitesi');
//            $message->to('furkan@gmail.com');
//            $message->setBody(' Mesaji Gonderen: '. $request->name.'<br>
//                    Mesaji Gonderen Mail : ' .$request->email.'<br>
//                    Mesaj Konusu: ' . $request->topic.'<br>
//                    Mesaj : '.$request->message.'<br><br>
//                    Mesaj gonderilme tarihi: '.$request->created_at.'','text/html');
//            $message->subject($request->name. ' iletisimden mesaj gonderdi!');
//        });


        Mail::raw(' Mesaji Gonderen: ' . $request->name . '<br>
                    Mesaji Gonderen Mail : ' . $request->email . '<br>
                    Mesaj Konusu: ' . $request->topic . '<br>
                    Mesaj : ' . $request->message . '<br><br>
                    Mesaj gonderilme tarihi: ' . now() . '', function ($message) use ($request) {
            $message->from('iletisim@blogsitesi.com', 'Blog sitesi');
            $message->to('furkan@gmail.com');
            $message->subject($request->name . ' iletisimden mesaj gonderdi!');
        });


//        $contact = new Contact;
//        $contact->name = $request->name;
//        $contact->email = $request->email;
//        $contact->topic = $request->topic;
//        $contact->message = $request->message;
//        $contact->save();
        return redirect()->route('contact')->with('success', 'Mesajiniz basariyla iletildi. Tesekkur ederiz!');
    }


}


