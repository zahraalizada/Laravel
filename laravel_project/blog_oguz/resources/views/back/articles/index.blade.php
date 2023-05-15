@extends('back.layouts.master')
@section('title','Tum Makaleler')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                @yield('title')
                <div class="float-right">
                    <span >{{$articles->count()}} makale bulundu</span>
                    <a href="{{route('admin.trashed.article')}}" class="btn btn-primary btn-sm "><i class="fa fa-trash pr-1"></i> Silinen makaleler</a>
                </div>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Fotoraf</th>
                        <th>Makale Basligi</th>
                        <th>Kategori</th>
                        <th>Goruntulenme sayi</th>
                        <th>Eklenme Tarihi</th>
                        <th>Durum</th>
                        <th>Islemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <td>
                                <img src="{{$article->image}}" width="100">
                            </td>
                            <td>{{$article->title}}</td>
                            <td>{{$article->getCategory->name}}</td>
                            <td>{{$article->hit}}</td>
                            <td>{{$article->created_at->diffForHumans()}}</td>
                            <td>
                                <div>
                                    <input class="switch" article-id="{{$article->id}}" type="checkbox" data-on="Aktif"
                                           data-onstyle="success" data-offstyle="danger" data-width="80"
                                           data-off="Pasif" @if($article->status==1) checked
                                           @endif data-toggle="toggle">
                                    <div id="console-event"></div>
                                </div>

                            </td>

                            <td>
                                <a target="_blank" href="{{route('single',[$article->getCategory->slug,$article->slug])}}" title="Goruntule" class="btn btn-sm btn-success"><i
                                        class="fa fa-eye"></i></a>
                                <a href="{{route('admin.makaleler.edit',$article->id)}}" title="Duzenle"
                                   class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                <a href="{{route('admin.delete.article',$article->id)}}" title="Sil"
                                   class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                                {{--  <form method="post" action="{{route('admin.makaleler.destroy',$article->id)}}">--}}
                                    {{--  @csrf--}}
                                    {{-- @method('DELETE')--}}
                                    {{-- <button type="submit" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>--}}
                                {{-- </form>--}}


                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css"
          rel="stylesheet">
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script>
        $(function () {
            $('.switch').change(function () {
                id = $(this)[0].getAttribute('article-id');
                statu = $(this).prop('checked');
                $.get("{{route('admin.switch')}}", {id: id, statu: statu}, function (data, status) {
                    console.log(data);
                });

            })
        })
    </script>
@endsection

