
<h1>Yeni Yazi Olustur</h1>

<form action="{{url('/posts/store')}}" method="post">
    @csrf
    <p>Yazi adi</p>
    <input type="text" name="title">
    <p>Yazi iceriyi</p>
    <textarea name="postContent"></textarea>
    <p>Kategori</p>
    <select name="category_id" >
        @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->title}}</option>
        @endforeach
    </select>
    <p> <input type="submit" value="Gonder"> </p>
</form>
