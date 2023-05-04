<div class="col-md-3">
    <div class="card">
        <div class="card-header">Categories</div>
        <div class="list-group">
            @foreach($categories as $category)
                <li class="list-group-item  d-flex justify-content-between align-items-center">
                    <a href="#">{{$category['name']}} </a><span class="badge bg-primary ">12</span>
                </li>
            @endforeach
        </div>
    </div>
</div>
