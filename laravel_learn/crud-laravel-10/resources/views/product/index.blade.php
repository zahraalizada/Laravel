@extends('layouts.app')


@section('body')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Product</h1>
        <a href="{{route('product.create')}}" class="btn btn-primary">Add Product</a>
    </div>
    <hr>
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
        </div>
    @endif

    <table class="table">
        <thead>
        <tr>
            <th class="col-1">#</th>
            <th class="col-2">Title</th>
            <th class="col-2">Price</th>
            <th class="col-2">Product Code</th>
            <th class="col-4">Description</th>
            <th class="col-1">Action</th>
        </tr>
        </thead>
        <tbody>
        @if($product->count() > 0)
            @foreach($product as $rs)
                <tr>
                    <th scope="row">{{$rs->id}}</th>
                    <td>{{$rs->title}}</td>
                    <td>{{$rs->price}}</td>
                    <td>{{$rs->product_code}}</td>
                    <td>{{$rs->description}}</td>
                    <td class="align-middle">
                        <div class="btn-group" role="group">
                            <a href="{{route('product.show',$rs->id)}}" type="button" class="btn btn-secondary">Detail</a>
                            <a href="{{route('product.edit',$rs->id)}}" type="button" class="btn btn-warning">Edit</a>
                            <form action="{{route('product.destroy',$rs->id)}}" method="post" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete product?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger m-0">Delete</button>
                            </form>


                        </div>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td class="text-center" colspan="5">Product not found</td>
            </tr>
        @endif
        </tbody>
    </table>

@endsection
