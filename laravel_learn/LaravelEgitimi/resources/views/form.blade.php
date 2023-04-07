<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ornek Form Sayfasi</title>
</head>
<body>

<form action="{{route('sonuc')}}" method="post">
    @csrf

    <textarea name="metin" style="width: 300px; height: 200px;"> </textarea><br>
    <input type="submit" name="ilet" value="Gonder">
</form>




</body>
</html>
