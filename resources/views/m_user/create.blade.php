@extends('m_user/template')
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Membuat daftar user</h2>
            </div>
            <div class="float-right">
                <a href="{{route('m_user.index')}}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
            <div class="alert alert-danger ">
                <strong>Ops</strong>Input gagal <br> <br>
                <ul>
                    @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                    @endforeach

                </ul>
            </div>
    @endif
    <form action="{{route('m_user.store')}}" method="post">
        @csrf
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Username : </strong>
                <input type="text" name="username" class="form-control" placeholder="Masukkan Username" id="">
            </div>  
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama : </strong>
                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama" id="">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password : </strong>
                <input type="password" name="nama" class="form-control" placeholder="Masukkan password" id="">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <button type="submit" class="btn btn-primary" >Submit</button>b
        </div>

    </form>
@endsection