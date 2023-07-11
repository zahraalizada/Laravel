@extends('layouts.app')

@section('body')
    <h1 class="mb-0">Edit Product</h1>
    <hr>
    <form action="{{route('product.update',$product->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="title" class="form-control" placeholder="Title" value="{{$product->title}}">
            </div>
            <div class="col">
                <input type="text" name="price" class="form-control" placeholder="Price" value="{{$product->price}}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="product_code" class="form-control" placeholder="Product Code" value="{{$product->product_code}}">
            </div>
            <div class="col">
                <textarea name="description" placeholder="Description" class="form-control">{{$product->description}}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>

@endsection
