@extends('layouts.admin')

@php
    if($experience){
        $experienceText='Deneyim Duzenleme';
}
    else{
        $experienceText='Yeni Deneyim Ekleme';
    }
@endphp

@section('title') {{$experienceText}} @endsection
@section('css') @endsection
@section('content')
    <div class="page-header">
        <h3 class="page-title"> {{$experienceText}} </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Admin Panel</a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.experience.list')}}">Deneyim Bilgileri Listesi</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"> {{$experienceText}}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" id="createExperienceForm" action="" method="POST">
                        @csrf
                        @if($experience)
                            <input type="hidden" name="educationID" value="{{$experience->id}}">
                        @endif
                        <div class="form-group">
                            <label for="date">Calisma Tarihi</label>
                            <input type="text" class="form-control" id="date" name="date"
                                   placeholder="Calisma Tarihi" value="{{$experience ? $experience->date : ''}}">
                            <p><small class="text-muted">Ornegin: 2012-2017</small></p>
                            @error('date')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="task_name">Gorev Adi</label>
                            <input type="email" class="form-control" id="task_name" name="task_name"
                                   placeholder="Calisdiniz Pozisyon" value="{{$experience ? $experience->task_name : ''}}" >
                            @error('university_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="company_name">Calistiginiz Firma</label>
                            <input type="email" class="form-control" id="company_name" name="company_name"
                                   placeholder="Calistiginiz Firma" value="{{$experience ? $experience->university_branch : ''}}">
                            @error('company_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Aciklama </label>
                            <textarea cols="30" rows="7" class="form-control" id="description" name="description"
                                      placeholder="Aciklama"> {{$experience ? $experience->description : ''}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="order">Goruntulenecek Deneyim Sirasi </label>
                            <input type="email" class="form-control" id="order" name="order"
                                   placeholder="Goruntulenecek Deneyim Sirasi " value="{{$experience ? $experience->order : ''}}">
                            @error('order')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="form-check form-check-success">
                                <?php
                                    if ($experience){
                                        $checkStatus = $experience->status ? "checked" : '';
                                    } else{
                                        $checkStatus = '';
                                    }
                                ?>
                                <label class="form-check-label" for="status">
                                    <input type="checkbox" name="status" id="status" class="form-check-input" {{$checkStatus}}>
                                    Deneyim Anasayfada Gosterilsin
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-check form-check-success">
                                <label class="form-check-label" for="active">
                                    <?php
                                    if ($experience){
                                        $checkActive = $experience->active ? "checked" : '';
                                    } else{
                                        $checkActive = '';
                                    }
                                    ?>
                                    <input type="checkbox" name="active" id="active" class="form-check-input" {{$checkActive}}>
                                    Ilgili pozisyonda calismaya devam ediyormusunuz?
                                </label>
                            </div>
                        </div>

                        <button type="button" class="btn btn-primary me-2" id="createButton">Kaydet</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')

    <script>
        let createButton = $("#createButton");
        createButton.click(function () {
            $('#createEducationForm').submit();

            if ($('#date').val().trim() == '') {
                Swal.fire({
                    icon: 'info',
                    title: 'Uyari!',
                    text: 'Lutfen Calisma tarihini bos birakmayiniz!',
                    confirmButtonText: "Tamam"
                });
            }
            else if ($('#task_name').val().trim() == '') {
                Swal.fire({
                    icon: 'info',
                    title: 'Uyari!',
                    text: 'Lutfen Calistiginiz pozisyon bilgisini bos birakmayiniz!',
                    confirmButtonText: "Tamam"
                });
            }
            else if ($('#company_name').val().trim() == '') {
                Swal.fire({
                    icon: 'info',
                    title: 'Uyari!',
                    text: 'Lutfen Calistiginiz firma ismini  bos birakmayiniz!',
                    confirmButtonText: "Tamam"
                });
            } else {
                $('#createExperienceForm').submit();
            }
        });
    </script>

@endsection
