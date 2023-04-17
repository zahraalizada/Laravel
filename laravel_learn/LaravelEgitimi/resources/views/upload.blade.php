<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resim Upload Uygulamasi</title>
</head>
<body>

<form action="{{route('yukle')}}" method="post" enctype="multipart/form-data">
    @csrf

    <label>Resim Seciniz</label> <br><br>
    <input type="file" name="resim"> <br><br>
    <input type="submit" name="ilet" value="Resim Yukle"> <br>




</form>




</body>
</html>
