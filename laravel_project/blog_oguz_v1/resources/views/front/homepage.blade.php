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
        <!-- Post preview-->
        <div class="post-preview">
            <a href="post.html">
                <h2 class="post-title">Man must explore, and this is exploration at its greatest</h2>
                <h3 class="post-subtitle">Problems look mighty small from 150 miles up</h3>
            </a>
            <p class="post-meta">
                Posted by
                <a href="#!">Start Bootstrap</a>
                on September 24, 2023
            </p>
        </div>
        <!-- Divider-->
        <hr class="my-4"/>
        <!-- Post preview-->
        <div class="post-preview">
            <a href="post.html"><h2 class="post-title">I believe every human has a finite number of heartbeats. I don't
                    intend to waste any of mine.</h2></a>
            <p class="post-meta">
                Posted by
                <a href="#!">Start Bootstrap</a>
                on September 18, 2023
            </p>
        </div>
        <!-- Divider-->
        <hr class="my-4"/>
        <!-- Post preview-->
        <div class="post-preview">
            <a href="post.html">
                <h2 class="post-title">Science has not yet mastered prophecy</h2>
                <h3 class="post-subtitle">We predict too much for the next year and yet far too little for the next
                    ten.</h3>
            </a>
            <p class="post-meta">
                Posted by
                <a href="#!">Start Bootstrap</a>
                on August 24, 2023
            </p>
        </div>
        <!-- Divider-->
        <hr class="my-4"/>
        <!-- Post preview-->
        <div class="post-preview">
            <a href="post.html">
                <h2 class="post-title">Failure is not an option</h2>
                <h3 class="post-subtitle">Many say exploration is part of our destiny, but it’s actually our duty to
                    future generations.</h3>
            </a>
            <p class="post-meta">
                Posted by
                <a href="#!">Start Bootstrap</a>
                on July 8, 2023
            </p>
        </div>
        <!-- Divider-->
        <hr class="my-4"/>
        <!-- Pager-->
        <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts
                →</a></div>
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
