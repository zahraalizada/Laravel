<h1>Web Sitesi</h1>

<button><a href="{{'/categories/create'}}" > categories->Posts Blade Php </a></button>

@foreach($category_post->posts as $post)
    <a href="/posts/{{$post->slug}}">
        <p>{{$post->title}}</p>
    </a>
@endforeach
