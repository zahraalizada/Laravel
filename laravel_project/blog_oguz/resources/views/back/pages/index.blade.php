@extends('back.layouts.master')
@section('title','Tum Sayfalar')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                @yield('title')
                <div class="float-right">
                    <span >{{$pages->count()}} sayfa bulundu</span>

                </div>
            </h6>
        </div>
        <div class="card-body">
            <div id="orderSuccess" style="display: none" class="alert alert-success">
                Siralama basariyla guncellendi.
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th width="50px">Siralama</th>
                        <th>Fotoraf</th>
                        <th>Sayfa Basligi</th>
                        <th>Durum</th>
                        <th>Islemler</th>
                    </tr>
                    </thead>
                    <tbody id="orders">
                    @foreach($pages as $page)
                        <tr id="page_{{$page->id}}">
                            <td><i class="fa fa-arrows-alt-v fa-2x handle" style="cursor: move"></i></td>
                            <td>
                                <img src="{{$page->image}}" width="100">
                            </td>
                            <td>{{$page->title}}</td>
                            <td>
                                <div>
                                    <input class="switch" page-id="{{$page->id}}" type="checkbox" data-on="Aktif"
                                           data-onstyle="success" data-offstyle="danger" data-width="80"
                                           data-off="Pasif" @if($page->status==1) checked
                                           @endif data-toggle="toggle">
                                    <div id="console-event"></div>
                                </div>
                            </td>
                            <td>
                                <a target="_blank" href="{{route('page',$page->slug)}}" title="Goruntule" class="btn btn-sm btn-success"><i
                                        class="fa fa-eye"></i></a>
                                <a href="{{route('admin.page.edit',$page->id)}}" title="Duzenle"
                                   class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                <a href="{{route('admin.page.delete',$page->id)}}" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js" integrity="sha512-Eezs+g9Lq4TCCq0wae01s9PuNWzHYoCMkE97e2qdkYthpI0pzC3UGB03lgEHn2XM85hDOUF6qgqqszs+iXU4UA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script>
        $('#orders').sortable({
            handle:'.handle',
            update:function () {
                var siralama = $('#orders').sortable('serialize');
                $.get("{{route('admin.page.orders')}}?"+siralama,function (data,status){
                    $("#orderSuccess").show();
                    setTimeout(function () { $("#orderSuccess").hide(); }, 2000);
                });
            }
        });
    </script>
    <script>
        $(function () {
            $('.switch').change(function () {
                id = $(this)[0].getAttribute('page-id');
                statu = $(this).prop('checked');
                $.get("{{route('admin.page.switch')}}", {id: id, statu: statu}, function (data, status) {
                    console.log(data);
                });

            })
        })
    </script>
@endsection

