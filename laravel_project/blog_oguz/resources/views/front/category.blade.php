<!-- Main Content-->
@extends('front.layouts.master')
@section('title', $category->name." Kategorisi")
@section('content')

    @include('front.widgets.articleList')
    @include('front.widgets.categoryWidget')

@endsection


