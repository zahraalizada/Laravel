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
                        <a href="{{route('admin.education.add')}}" class="btn btn-primary btn-block">Yeni Egitim Ekle</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Egitim Tarihi.</th>
                                <th>Bolum</th>
                                <th>Universite</th>
                                <th>Aciklama</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>#</td>
                                <td>53275531</td>
                                <td>12 May 2017</td>
                                <td>12 May 2017</td>
                                <td><label class="badge badge-danger">Pending</label></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js') @endsection
