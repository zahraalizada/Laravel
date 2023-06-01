
<h1>Yeni Categori Olustur</h1>

{{--
    - Bir form varsa bu formun bir yerde karsialnmasi lazim. web.php  dosyasina gidip Route::post ile yonlendiriyoruz
    - url('/categories/store') ile bu formun store-a gideceyini belirtiyoruz

 --}}
<form action="{{url('/categories/store')}}" method="post">
    @csrf
    <p>Kategori Adi</p>
    <input type="text" name="title" />
    <input type="submit"  value="Submit"/>
</form>
