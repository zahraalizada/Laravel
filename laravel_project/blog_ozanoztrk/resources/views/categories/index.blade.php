<h1>Web Sitesi</h1>

<button><a href="{{'/categories/create'}}" > Yeni Kategori Olustur </a></button>

@foreach($categories as $category)
    <a href="/categories/edit/{{$category->id}}">
        <p>{{$category->title}}</p>
    </a>
@endforeach
