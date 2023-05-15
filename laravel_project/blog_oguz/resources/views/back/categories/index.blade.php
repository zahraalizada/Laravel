@extends('back.layouts.master')
@section('title','Tum Kategoriler')
@section('content')

    <div class="row">
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Yeni kategori olustur</h6>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.category.create')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Kategori adi</label>
                            <input type="text" class="form-control" name="categoryName" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-primary">Ekle</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Kategori adi</th>
                                <th>Makale sayisi</th>
                                <th>Durum</th>
                                <th>Islemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->articleCount()}}</td>
                                    <td>
                                        <div>
                                            <input class="switch" category-id="{{$category->id}}" type="checkbox"
                                                   data-on="Aktif" data-off="Pasif"
                                                   data-onstyle="success" data-offstyle="danger" data-width="80"
                                                   @if($category->status==1) checked @endif data-toggle="toggle">
                                            <div id="console-event"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <a category-id="{{$category->id}}" title="Duzenle" class="btn btn-sm btn-primary edit-click">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a category-id="{{$category->id}}" category-name="{{$category->name}}" category-count="{{$category->articleCount()}}" title="Sil" class="btn btn-sm btn-danger remove-click">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Edit Category Modal -->
    <div class="modal" id="editModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Kategoriyi duzenle</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form method="post" action="{{route('admin.category.update')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Kategori adi</label>
                            <input id="category" type="text" class="form-control" name="category">
                            <input  type="hidden" name="id" id="category_id">
                        </div>
                        <div class="form-group">
                            <label>Slug adi</label>
                            <input id="slug" type="text" class="form-control" name="slug">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
                        <button type="submit" class="btn btn-success">Kayd et</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Category Modal -->
    <div class="modal" id="deleteModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Kategoriyi sil</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div id="modal-body"  class="modal-body">
                    <div  class="alert alert-danger" id="articleAlert"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                    <form method="post" action="{{route('admin.category.delete')}}">
                        @csrf
                        <input type="hidden" name="id" id="deleteId">
                        <button id="deleteButton" type="submit" class="btn btn-danger">Sil</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('css')
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

    <script>
        $(function () {
            // delete button
            $('.remove-click').click(function () {
                id = $(this)[0].getAttribute('category-id');
                count = $(this)[0].getAttribute('category-count');
                name = $(this)[0].getAttribute('category-name');

                if(id==1){

                    $('#articleAlert').html(name+' kategorisi sabit kategoridir. Silinen diger kategorilere ait makaleler bu kategoriye eklenecektir');
                    $('#modal-body').show();
                    $('#deleteButton').hide();
                    $('#deleteModal').modal();
                    return;
                }

                $('#deleteButton').show();
                $('#deleteId').val(id);
                $('#articleAlert').html('');
                $('#modal-body').hide();

                if(count>0){
                    $('#articleAlert').html('Bu kategoriye ait '+count+'makale bulunmaktadir. Silmek istediginize emin misiniz?');
                    $('#modal-body').show();
                }
                $('#deleteModal').modal();
            });

            // edit button
            $('.edit-click').click(function () {
                id = $(this)[0].getAttribute('category-id');
                $.ajax({
                    type: 'GET',
                    url: '{{route('admin.category.getdata')}}',
                    data: {id: id},
                    success: function (data) {
                        console.log(data);
                        $('#category').val(data.name);
                        $('#slug').val(data.slug);
                        $('#category_id').val(data.id);
                        $(document).find('#editModal').modal('show');
                    }
                })
            });


            // switch toggle icin fonksyon
            $('.switch').change(function () {
                id = $(this)[0].getAttribute('category-id');
                statu = $(this).prop('checked');
                $.get("{{route('admin.category.switch')}}", {id: id, statu: statu}, function (data, status) {
                    console.log(data);
                });

            })
        })
    </script>
@endsection



