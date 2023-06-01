<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CategoryController extends Controller
{
    public function index()
    {
        // Category::all() - Category modeline git ve categories tablosundaki verilerin hepsini cek
        $categories = Category::all();
        /*
          - view categories.index - kismi view kalsorunde categories isimli bir klasor ve icerisinde index.blade.php isimli bir dosya var demekdir
          - compact('categories') - yukarida tanimladigimiz categories deyiskenini kast ediyor, $ isaretsiz kullaniliyor compact metodu oldugu icin.
        */
        return view('categories.index', compact('categories'));
    }

    // routedan buraya geldiyi zaman calismasini istediyimiz fonksiyon
    public function create()
    {
        //view ile categories klasoru icerisindeki create.blade.php dosyasina gitmesi lazim
        return view('categories.create');
    }

    // bu fonskiyon bir request bekliyor, post metoduyla gonderilen verileri ala bilmek icin
    public function store(Request $request)
    {
        //dd($request->all()); // dd ile requestlerin geldiyini denetle

        $category = new Category(); //yeni bir Category modeli yaradilir
        $category->title = $request->title; // yaradilmis (yeni model olan $categories->title)-a request ile alinan title degeri assign edilir
        $category->save(); // yaradilmis Category modeli database-a kayd edilir

        return redirect('/categories'); // categories sayfasina geri dondurur
    }

    /*
     * Burada web.php Routedan gelen id-i al
     */
    public function edit($id)
    {
        //Category modeli icerisinde query yap, findOrFail metoduyla kontrol ederek varsa getir yoksa hata ver
        $category = Category::findOrFail($id);
        // compact metoduyla bu row-u categories.edit sayfasina gonder
        // note: categories.edit sayfasi - views klasoru icerisindeki categories klasorundeki edit.blade.php dosyasi anlamina geliyor
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        // once gelen kategori satrimizi(row-umuzu) buluyoruz findOrFail metodundaki $id ile
        $category = Category::findOrFail($id);
        // Daha sonra bu rowda olan title alanini seciyoruz, requestden gelen title-i assign ediyoruz
        $category->title = $request->title;
        $category->save(); // Category modeli database-a kayd edilir

        return redirect('/categories'); // categories sayfasina geri dondurur
    }

    public function getPost($id)
    {
        $category_post = Category::findOrFail($id);

        return view('categories.posts',compact('category_post'));
    }
}
