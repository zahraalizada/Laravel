<!-- Main Content-->
@extends('front.layouts.master')
@section('title', $article->title)
@section('bg', $article->image)
@section('content')
                <div class="col-md-9 col-lg-8 col-xl-7">
                    <p>{{$article->content}}</p>
                    <a href="#!"><img  class="img-fluid" src="{{$article->image}}" alt="..." /></a>
                    <span class="caption text-muted">To go places and do things that have never been done before – that’s what living is all about.</span>
                    <p>{{$article->content}}</p>
                    <p>{{$article->content}}</p>
                    <p>
                         Views:
                        <b>{{$article->hit}}</b>

                    </p>
                </div>
                @include('front.widgets.categoryWidget')

@endsection


