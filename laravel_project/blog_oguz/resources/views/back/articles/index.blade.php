@extends('back.layouts.master')
@section('title','Tum Makaleler')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <span >Tum makaleler</span>
                <span class="float-right">{{$articles->count()}} makale bulundu</span>
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
                            <td>{!!$article->status===0 ? "<span class='badge badge-danger'>Pasif</span>" : "<span class='badge badge-success'>Aktif</span>" !!}</td>
                            <td>
                                <a href="#" title="Goruntule" class="btn btn-sm btn-success"><i
                                        class="fa fa-eye"></i></a>
                                <a href="#" title="Duzenle" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                <a href="#" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

