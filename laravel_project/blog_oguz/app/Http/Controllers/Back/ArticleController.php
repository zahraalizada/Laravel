<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::orderBy('created_at','DESC')->get();
        return view('back.articles.index',compact('articles'));//  compact icerisinde olan $articles degeri
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        return view('back.articles.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'title' => 'min:3',
           'image' =>'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $article=new Article;
        $article->title = $request->title;
        $article->category_id = $request->category;
        $article->content = $request->content;
        $article->slug = str_slug($request->title);

        if ($request->hasFile('image')){
            $imageName = str_slug($request->title).".".$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            $article->image='/uploads/'.$imageName;
        }
        $article->save();
        notify()->success('Basariyla kayd edildi!');
        return redirect()->route('admin.makaleler.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article =Article::findorFail ($id);
        $categories=Category::all();
        return view('back.articles.update',compact('categories','article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'min:3',
            'image' =>'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $article=Article::findOrFail($id);
        $article->title = $request->title;
        $article->category_id = $request->category;
        $article->content = $request->content;
        $article->slug = str_slug($request->title);

        if ($request->hasFile('image')){
            $imageName = str_slug($request->title).".".$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            $article->image='uploads/'.$imageName;
        }
        $article->save();
        notify()->success('Basarili','Basariyla guncellendi!');
        return redirect()->route('admin.makaleler.index');
    }

    public function switch(Request $request){
        $article=Article::findOrFail($request->id);
        $article->status=$request->statu=="true" ? 1 : 0;
        $article->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id){
        Article::find($id)->delete();
        notify()->success('Makale Geridonusume tasindi');
        return redirect()->route('admin.makaleler.index');
    }

    public function trashed(){
        $articles =Article::onlyTrashed()->orderBy('deleted_at','desc')->get();
        return view('back.articles.trashed',compact('articles'));
    }

    public function recover($id){
        Article::onlyTrashed()->find($id)->restore();
        notify()->success('Makale restore olundu');
        return redirect()->route('admin.makaleler.index');
    }

    public function hardDelete($id){

        $article = Article::onlyTrashed()->find($id);
        if ($article && $article->image) {
            $imagePath = public_path($article->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        $article->forceDelete();
        notify()->success('Makale tamemen silindi');
        return redirect()->route('admin.trashed.article');
    }

    public function destroy(string $id)
    {

    }
}
