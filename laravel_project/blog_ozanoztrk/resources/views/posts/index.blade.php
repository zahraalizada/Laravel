<h1>Burasi Posts index</h1>

<button><a href="{{'/posts/create'}}">Yeni Bir yazi Olustur</a></button>

{{--postlari PostController-de index metodunda cekip index.blade.php-e gonderdiyimiz icin burada kullana  biliyoruz --}}
@foreach($posts as $post)
    <a href="/posts/{{$post->slug}}"><p>{{$post->title}}</p></a>
    <p>{{$post->content}}</p>
@endforeach

<p>{{$post->category->title}}</p>

