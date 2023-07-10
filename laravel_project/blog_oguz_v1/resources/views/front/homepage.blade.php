{{-- master.blade.php dosyasi extend oldugu icin oradaki yapi calisicak --}}
@extends('front.layouts.master')
{{--
    header.blade.php dosyasinda @yield('content') ile belirtdiyimiz alani kullanmak icin asagidaki metodlari kullana biliriz:
    - (@section('title') Ornek_Baslik_Ismi @endsection)
    - @section('title','Ornek_Baslik_Ismi')
--}}
@section('title','Anasayfa')
{{-- master.blade.php dosyasinda @yield('content') ile belirtdiyimiz alana ekleme yapmak icin @section('alan adi')-@endsection kod araligini kullaniyoruz --}}
@section('content')

    <div class="col-md-9">
        @foreach($articles as $article)
            <!-- Post preview-->
            <div class="post-preview">
                <a href="post.html">
                    <h2 class="post-title">{{$article->title}}</h2>
                    <h3 class="post-subtitle">{{$article->content}}</h3>
                    <h3 class="post-subtitle">{{$article->category_id}}</h3>
                </a>
                <p class="post-meta">
                    Posted by

                    on September 24, 2023
                </p>
            </div>
            <!-- Divider-->
        @endforeach

    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">Kategoriler</div>
            <ul class="list-group">
                @foreach($categories as $category)
                    <li class="list-group-item">
                        <a href="#">{{$category->name}} <b class="ms-2 text-info">12</b></a>
                    </li>
                @endforeach

            </ul>
        </div>

    </div>
@endsection
