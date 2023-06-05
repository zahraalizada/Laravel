@extends('layouts.admin')
@section('title') Yeni Egitim Ekleme @endsection
@section('css') @endsection
@section('content')
    <div class="page-header">
        <h3 class="page-title"> Yeni Egitim Ekleme </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Admin Panel</a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.education.list')}}">Egitim Bilgileri Listesi</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"> Yeni Egitim Ekleme</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" id="createEducationForm" action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="education_date">Egitim Tarihi</label>
                            <input type="text" class="form-control" id="education_date" name="education_date"
                                   placeholder="Username">
                            <p><small class="text-muted">Ornegin: 2012-2017</small></p>
                            @error('education_date')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="university_name">Universite Adi</label>
                            <input type="email" class="form-control" id="university_name" name="university_name"
                                   placeholder="Email">
                            @error('university_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="university_branch">Universite Bolum</label>
                            <input type="email" class="form-control" id="university_branch" name="university_branch"
                                   placeholder="Universite Bolum">
                            @error('university_branch')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Aciklama </label>
                            <textarea cols="30" rows="7" class="form-control" id="description" name="description"
                                      placeholder="Aciklama"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="form-check form-check-success">
                                <label class="form-check-label" for="status">
                                    <input type="checkbox" name="status" id="status" class="form-check-input" checked>
                                    Egitim Anasayfada Gosterilsin </label>
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

            if ($('#education_date').val().trim() == '') {
                Swal.fire({
                    icon: 'info',
                    title: 'Uyari!',
                    text: 'Lutfen Egitim tarihini bos birakmayiniz!',
                    confirmButtonText: "Tamam"
                });
            } else if ($('#university_name').val().trim() == '') {
                Swal.fire({
                    icon: 'info',
                    title: 'Uyari!',
                    text: 'Lutfen Universite ismini bos birakmayiniz!',
                    confirmButtonText: "Tamam"
                });
            } else if ($('#university_branch').val().trim() == '') {
                Swal.fire({
                    icon: 'info',
                    title: 'Uyari!',
                    text: 'Lutfen Universite bolumunu bos birakmayiniz!',
                    confirmButtonText: "Tamam"
                });
            } else {
                $('#createEducationForm').submit();
            }
        });
    </script>

@endsection
