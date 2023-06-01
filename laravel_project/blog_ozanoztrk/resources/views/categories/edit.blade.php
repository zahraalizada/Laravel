
<h1>Kategoriyi Duzenle</h1>

{{--
    - Bir form varsa bu formun bir yerde karsialnmasi lazim. web.php  dosyasina gidip Route::post ile yonlendiriyoruz
    - url('/categories/store') ile bu formun store-a gideceyini belirtiyoruz
    - daha sonra CategoryController-de bulunan edit fonksiyonundan gelen $category row-unu kullan

 --}}
<form action="{{url('/categories/update')}}/{{$category->id}}" method="post">
    @csrf
    <p>Kategori Adi</p>
    <input type="text" name="title" value="{{$category->title}}"/>
    <input type="submit"  value="Submit"/>
</form>
