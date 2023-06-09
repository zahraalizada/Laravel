@extends('layouts.admin')
@section('title') Deneyim Bilgileri Listesi @endsection
@section('css') @endsection
@section('content')
    <div class="page-header">
        <h3 class="page-title"> Deneyim Bilgileri Listesi </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Admin Panel</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Deneyim Bilgileri Listesi</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <div class="col-md-3">
                        <a href="{{route('admin.experience.add')}}" class="btn btn-primary btn-block">Yeni Deneyim
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
                                <th>Calisma Tarihi</th>
                                <th>Pozisyon</th>
                                <th>Firma</th>
                                <th>Aciklama</th>
                                <th>Status</th>
                                <th>Active</th>
                                <th>Eklenme tarihi</th>
                                <th>Guncellenme tarihi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list as $item)
                                <tr id="{{$item->id}}">
                                    <td>{{$item->id}}</td>
                                    <td><a href="{{route('admin.experience.add',['experienceID' => $item->id])}}" class="btn btn-warning editEducation"><i
                                                class="fa fa-edit "></i></a></td>
                                    <td><a data-id="{{$item->id}}" href="javascript:void(0)" class="btn btn-danger deleteExperience"><i
                                                class="fa fa-trash "></i></a></td>

                                    <td>{{$item->order}}</td>
                                    <td>{{$item->date}}</td>
                                    <td>{{$item->task_name}}</td>
                                    <td>{{$item->company_name}}</td>
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
                                    <td>
                                        @if($item->active)
                                            <a data-id="{{$item->id}}" href="javascript:void(0)"
                                               class='btn btn-success activeStatus'>Aktif</a>
                                        @else
                                            <a data-id="{{$item->id}}" href="javascript:void(0)"
                                               class='btn btn-danger activeStatus'>Pasif</a>
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
            let experienceID = $(this).attr('data-id');
            let self = $(this);

            $.ajax({
                url: "{{route('admin.experience.changeStatus')}}",
                //method: "POST"
                type: "POST",
                async: false,
                data: {
                    experienceID: experienceID
                },
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Basarili',
                        text: response.experienceID + " ID'li kayit durumu " + response.newStatus + " olarak guncellenmistir",
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


            alert(experienceID);
        });

        //active
        $('.activeStatus').click(function () {
            let experienceID = $(this).attr('data-id');
            let self = $(this);

            $.ajax({
                url: "{{route('admin.experience.activeStatus')}}",
                type: "POST",
                async: false,
                data: {
                    experienceID: experienceID
                },
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Basarili',
                        text: response.experienceID + " ID'li kayit active durumu " + response.newStatus + " olarak guncellenmistir",
                        confirmButtonText: "Tamam"
                    });

                    console.log(self)

                    if (response.active == 1) {
                        self[0].textContent = "Aktif";
                        self.removeClass("btn-danger");
                        self.addClass("btn-success");
                    } else if (response.active == 0) {
                        self[0].textContent = "Pasif";
                        self.removeClass("btn-success");
                        self.addClass("btn-danger");
                    }

                },
                error: function () {

                }
            });


            alert(experienceID);
        });


        //
        $('.deleteExperience').click(function () {

            let experienceID = $(this).data('id');

            console.log(experienceID);
            Swal.fire({
                title:"Emin misiniz?",
                text: experienceID + " id-li deneyim bilgisini silmek istedigineize emin misiniz?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor:"#d33",
                confirmButtonText: "Evet",
                cancelButtonText: "Hayir"
            }).then((result) => {
                if(result.isConfirmed){

                    $.ajax({
                        url:"{{route('admin.experience.delete')}}",
                        type: "POST",
                        async: false,
                        data: {
                            experienceID: experienceID
                        },
                        success: function (response) {
                            Swal.fire({
                                icon:'success',
                                title:'Basarili!',
                                text: "Silme islemi basarili.",
                                confirmButtonText: "Tamam"
                            });

                            $("tr#" + experienceID).remove();

                        },
                        error: function () {

                        }
                    });


                }
            })







        });




    </script>

@endsection
