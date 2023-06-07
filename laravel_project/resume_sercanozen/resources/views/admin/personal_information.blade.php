@extends('layouts.admin')

@section('title') Kisisel Bilgiler @endsection
@section('css') @endsection
@section('content')
    <div class="page-header">
        <h3 class="page-title"> Kisisel Bilgiler </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Admin Panel</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Kisisel Bilgiler Duzenleme</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" id="createEducationForm" action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="main_title">Anasayfa Baslik</label>
                            <input type="text" class="form-control" id="main_title" name="main_title"
                                   placeholder="Anasayfa Baslik" value="{{$information->main_title}}">
                            <p><small class="text-muted">Ornegin: 2012-2017</small></p>
                            @error('main_title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="editor1">Hakkimda Yazisi</label><br>
                            <textarea class="form-control" style="height: 100px" id="editor1" name="about_text"  data-sample-short="" data-sample="1">{{$information->about_text}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="btn_contact_text">Bana Ulasin Butonu</label>
                            <input type="text" class="form-control" id="btn_contact_text" name="btn_contact_text"
                                   placeholder="Bana Ulasin Butonu" value="{{$information->btn_contact_text}}">
                            <p><small class="text-muted">Ornegin: 2012-2017</small></p>
                            @error('btn_contact_text')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="small_title_left">Egitim Basligi Uzerindeki Ufak Baslik</label>
                            <input type="text" class="form-control" id="small_title_left" name="small_title_left"
                                   placeholder="Egitim Basligi Uzerindeki Ufak Baslik" value="{{$information->small_title_left}}">
                            @error('small_title_left')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="small_title_right">Deneyim Basligi Uzerindeki Ufak Baslik</label>
                            <input type="text" class="form-control" id="small_title_right" name="small_title_right"
                                   placeholder="Deneyim Basligi Uzerindeki Ufak Baslik" value="{{$information->small_title_right}}">
                            @error('small_title_right')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="full_name">Ad Soyad</label>
                            <input type="text" class="form-control" id="full_name" name="full_name"
                                   placeholder="Ad Soyad" value="{{$information->full_name}}">
                            @error('full_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="image">Resim</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                    <img>
                                    @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <img src="{{asset($information->image ? 'storage/'. $information->image : 'assets/images/faces/face15.jpg')}}" class="rounded">
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="task_name">Pozisyon</label>
                            <input type="text" class="form-control" id="task_name" name="task_name"
                                   placeholder="Pozisyon" value="{{$information->task_name}}">
                            @error('task_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="birthday">Dogum Tarihi</label>
                            <input type="text" class="form-control" id="birthday" name="birthday"
                                   placeholder="Dogum Tarihi" value="{{$information->birthday}}">
                            @error('birthday')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="website">Web Sitesi</label>
                            <input type="text" class="form-control" id="website" name="website"
                                   placeholder="Web Sitesi" value="{{$information->website}}">
                            @error('website')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Telefon</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                   placeholder="Telefon" value="{{$information->phone}}">
                            @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="mail">E-posta</label>
                            <input type="text" class="form-control" id="mail" name="mail"
                                   placeholder="E-posta" value="{{$information->mail}}">
                            @error('mail')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Adres</label>
                            <input type="text" class="form-control" id="address" name="address"
                                   placeholder="Adres" value="{{$information->address}}">
                            @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="cv">Ozgecmis</label>
                            <input type="file" class="form-control" id="cv" name="cv">
                            @error('cv')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="editorLang">Diller</label><br>
                            <textarea class="form-control" style="height: 100px" id="editorLang" name="lang"  data-sample="1" data-sample-short="">{{$information->languages}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="editorInterests">Hobiler</label><br>
                            <textarea class="form-control" style="height: 100px" id="editorInterests" name="interests" data-sample-short="" data-sample="1">{{$information->interests}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="phone">Telefon</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                   placeholder="Telefon" value="{{$information->phone}}">
                            @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-primary me-2" id="createButton">Kaydet</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')

    <script>

    </script>

@endsection
