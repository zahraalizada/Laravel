@extends('back.layouts.master')
@section('title','Ayarlar')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">  @yield('title')  </h6>
        </div>
        <div class="card-body">

            <form action="{{route('admin.config.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Site Basligi</label>
                            <input name="title" type="text" class="form-control" required value="{{$config->title}}"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Site Aktif Durumu</label>
                            <select class="form-control" name="active">
                                <option @if ($config->active==1) selected @endif value="1">Acik</option>
                                <option @if ($config->active==0) selected @endif value="0">Kapali</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Site Logo</label>
                            <input name="logo" type="file" class="form-control"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Site Favicon</label>
                            <input name="favicon" type="file" class="form-control"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Facebook</label>
                            <input name="facebook" type="text" class="form-control" value="{{$config->facebook}}"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Twitter</label>
                            <input name="twitter" type="text" class="form-control" value="{{$config->twitter}}"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Github</label>
                            <input name="github" type="text" class="form-control" value="{{$config->github}}"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Linkedin</label>
                            <input name="linkedin" type="text" class="form-control" value="{{$config->linkedin}}"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Youtube</label>
                            <input name="youtube" type="text" class="form-control" value="{{$config->youtube}}"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Instagram</label>
                            <input name="instagram" type="text" class="form-control" value="{{$config->instagram}}"/>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block btn-md">Guncelle</button>
                </div>
            </form>

        </div>
    </div>
@endsection



