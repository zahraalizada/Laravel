<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cocur\Slugify\Slugify;

class PostController extends Controller
{
    public function index()
    {
        // Post::all() - Post modeline git ve post tablosundaki verilerin hepsini cek
        $posts = Post::all();

        /*
         - view posts.index - kismi view kalsorunde posts isimli bir klasor ve icerisinde index.blade.php isimli bir dosya var demekdir
         - compact('posts') - yukarida tanimladigimiz posts deyiskenini kast ediyor, $ isaretsiz kullaniliyor compact metodu oldugu icin. bu sayede datalari gonderiyor index.blade.php dosyasina
       */
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        // yeni bir yazi olusturmamiz icin bir kategoriye ihtiyacimiz var, categoride olan butun datalari all metoduyla aliriq
        $categories = Category::all();

        // $categories-e gelen datalari posts klasorundeki creat.blade.php dosyasina gonderirik compact metodu ile
        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $slugify =new Slugify();
        $slugify->activateRuleSet('turkish');

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->postContent;
        $post->category_id = $request->category_id;
        $post->slug =  $slugify->slugify($request->title);
        $post->save();
        return redirect('posts');
    }
}
