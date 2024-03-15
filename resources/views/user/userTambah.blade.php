<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Form tambah data user</h1>

    <form method="POST" action="/user/tambah_simpan">
    {{ csrf_field() }}
    <label for="">username</label>
    <input type="text" name="username" placeholder="masukkan username" id="">
    <br>
    <label for="">nama</label>
    <input type="text" name="nama" placeholder="masukkan name" id="">
    <br>
    <label for="">Password</label>
    <input type="password" name="password" placeholder="masukkan password" id="">
    <br>
    <label for="">level ID</label>
    <input type="number" name="level_id" placeholder="masukkan id level" id="">
    <br><br>
    <input type="submit" class="btn btn-success" value="simpan">
</form>

</body>
</html>