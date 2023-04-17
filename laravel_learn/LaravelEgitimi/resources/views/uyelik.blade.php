<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uye Kayit Formu</title>
</head>
<body>
@if($errors->any())
    <ul>
    @foreach($errors->all() as $hatalar)
        <li>{{$hatalar}}</li>
    @endforeach
    </ul>
@endif

<form action="{{route('uyekayit')}}" method="post">
    @csrf

    <label>Ad Soyad</label> <br>
    <input type="text" name="adsoyad"><br>

    <label>Telefon</label> <br>
    <input type="text" name="telefon"><br>

    <label>Mail</label> <br>
    <input type="text" name="mail"><br>

    <input type="submit" name="ilet" value="Gonder">
</form>


</body>
</html>
