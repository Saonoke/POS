<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Form Ubah Data User</h1>
    <a href="/user">Kembali</a>
    <form method="post" action="/user/ubah_simpan/{{$data->user_id}}">
        @csrf
        @method('PUT')
        <label for="">username</label>
        <input type="text" name="username" placeholder="masukkan username" value="{{$data->username}}" id="">
        <br>
        <label for="">nama</label>
        <input type="text" name="nama" placeholder="masukkan name" value="{{$data->nama}}" id="">
        <br>
        <label for="">Password</label>
        <input type="password" name="password" placeholder="masukkan password" id="" value="value="{{$data->password}}"">
        <br>
        <label for="">level ID</label>
        <input type="number" name="level_id" placeholder="masukkan id level" id="" value="{{$data->level_id}}">
        <br><br>
        <input type="submit" class="btn btn-success" value="simpan" >
</body>
</html>