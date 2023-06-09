@extends('layouts.admin')
@section('title') Egitim Bilgileri Listesi @endsection
@section('css') @endsection
@section('content')
    <div class="page-header">
        <h3 class="page-title"> Egitim Bilgileri Listesi </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Admin Panel</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Egitim Bilgileri Listesi</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <div class="col-md-3">
                        <a href="{{route('admin.education.add')}}" class="btn btn-primary btn-block">Yeni Egitim
                            Ekle</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Duzenle</th>
                                <th>Sil</th>
                                <th>Siralama</th>
                                <th>Egitim Tarihi</th>
                                <th>Universite</th>
                                <th>Bolum</th>
                                <th>Aciklama</th>
                                <th>Status</th>
                                <th>Eklenme tarihi</th>
                                <th>Guncellenme tarihi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list as $item)
                                <tr id="{{$item->id}}">
                                    <td>{{$item->id}}</td>
                                    <td><a href="{{route('admin.education.add',['educationID' => $item->id])}}" class="btn btn-warning editEducation"><i
                                                class="fa fa-edit "></i></a></td>
                                    <td><a data-id="{{$item->id}}" href="javascript:void(0)" class="btn btn-danger deleteEducation"><i
                                                class="fa fa-trash "></i></a></td>
                                    <td>{{$item->order}}</td>
                                    <td>{{$item->education_date}}</td>
                                    <td>{{$item->university_name}}</td>
                                    <td>{{$item->university_branch}}</td>
                                    <td>{{$item->description}}</td>
                                    <td>
                                        @if($item->status)
                                            <a data-id="{{$item->id}}" href="javascript:void(0)"
                                               class='btn btn-success changeStatus'>Aktif</a>
                                        @else
                                            <a data-id="{{$item->id}}" href="javascript:void(0)"
                                               class='btn btn-danger changeStatus'>Pasif</a>
                                        @endif
                                    </td>
                                    <td>{{\Carbon\Carbon::parse($item->created_at)->format("d-m-Y H:i:s")}}</td>
                                    <td>{{\Carbon\Carbon::parse($item->updated_at)->format("d-m-Y H:i:s")}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')

    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
            }
        });

        // statusu aktif pasif etmek icin fonksiyon
        $('.changeStatus').click(function () {
            // let educationID = $(this).data('id');
            let educationID = $(this).attr('data-id');
            let self = $(this);

            $.ajax({
                url: "{{route('admin.education.changeStatus')}}",
                //method: "POST"
                type: "POST",
                async: false,
                data: {
                    educationID: educationID
                },
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Basarili',
                        text: response.educationID + " ID'li kayit durumu " + response.newStatus + " olarak guncellenmistir",
                        confirmButtonText: "Tamam"
                    });

                    console.log(self)

                    if (response.status == 1) {
                        self[0].textContent = "Aktif";
                        self.removeClass("btn-danger");
                        self.addClass("btn-success");
                    } else if (response.status == 0) {
                        self[0].textContent = "Pasif";
                        self.removeClass("btn-success");
                        self.addClass("btn-danger");
                    }

                },
                error: function () {

                }
            });
            // }).done(function () {
            //
            // }).fail(function () {
            //
            // })


            alert(educationID);
        });


        //
        $('.deleteEducation').click(function () {

            let educationID = $(this).data('id');

            console.log(educationID);
            Swal.fire({
                title:"Emin misiniz?",
                text: educationID + " id-li egitim bilgisini silmek istedigineize emin misiniz?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor:"#d33",
                confirmButtonText: "Evet",
                cancelButtonText: "Hayir"
            }).then((result) => {
                if(result.isConfirmed){

                    $.ajax({
                        url:"{{route('admin.education.delete')}}",
                        type: "POST",
                        async: false,
                        data: {
                            educationID: educationID
                        },
                        success: function (response) {
                            Swal.fire({
                                icon:'success',
                                title:'Basarili!',
                                text: "Silme islemi basarili.",
                                confirmButtonText: "Tamam"
                            });

                            $("tr#" + educationID).remove();

                        },
                        error: function () {

                        }
                    });


                }
            })







        });




    </script>

@endsection
