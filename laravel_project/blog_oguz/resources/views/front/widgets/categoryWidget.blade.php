@isset($categories)
<div class="col-md-3">
    <div class="card">
        <div class="card-header">Categories</div>
        <div class="list-group">
            @foreach($categories as $category)

                <li class="list-group-item  @if (Request::segment(2)==$category->slug) active @endif  d-flex justify-content-between align-items-center">
                    <a @if (Request::segment(2)!=$category->slug) href="{{route('category',$category->slug)}}" @endif  >{{$category['name']}} </a>
                    <span class="badge bg-primary ">{{$category->articleCount()}}</span>
                </li>
            @endforeach
        </div>
    </div>
</div>
@endif
