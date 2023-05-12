<div class="col-md-9">
    @if(count($articles)>0)
        @foreach($articles as $article)
            <div class="post-preview">
                <a href="{{route('single',[$article->getCategory->slug,$article->slug])}}">
                    <h2 class="post-title">{{$article->title}}</h2>
                    <img class="img-fluid" src="{{$article->image}}">
                    <h3 class="post-subtitle">{{str_limit($article->content,75)}}</h3>
                </a>
                <p class="post-meta">
                    Category:
                    <a href="#!">{{$article->getCategory->name}}</a>
                    <span class="float-end">{{$article->created_at->diffForHumans()}}</span>

                </p>
            </div>

            @if(!($loop->last))
                <hr class="my-4"/>
            @endif

        @endforeach
        <div class="row">
            <div class="col-4">
                {{$articles->links('pagination::bootstrap-4')}}
            </div>
        </div>
    @else
        <div class="alert alert-danger">
            <h3>Bu kategoriye ait yazi bulunamadi</h3>
        </div>
    @endif
</div>


