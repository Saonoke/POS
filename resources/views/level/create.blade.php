@extends('layout.template')
@section('content')
<div class="card card-outline card-primary">
<div class="card-header">
<h3 class="card-title">{{ $page->title }}</h3>
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
    <form action="{{url('level')}}" method="post" class="form-horizontal">
        @csrf
        @method('POST')
        <div class="col-xs-12 col-sm-12 col-md-12 mt-5">
            <div class="form-group row">
               <label  class="col-1 control-label col-form-label" for="level_kode">Level Kode :</label>
               <div class="col-11">
                <input type="text" name="level_kode" class="form-control" placeholder="Masukkan kode level" id="">
               </div>
               
            </div>  
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group row">
                <label for="level_nama"  class="col-1 control-label col-form-label" >Level Nama :</label>
                <div class="col-11">

                    <input type="text" name="level_nama" class="form-control" placeholder="Masukkan kode nama" id="">
                </div>
            </div>
        </div>
    <div class="form-group row">
        <label for="level_nama"  class="col-1 control-label col-form-label" ></label>
        <div class="col-11">
            <button type="submit" class="btn btn-primary btn-sm ">Simpan</button>
            <a class="btn btn-sm btn-default ml-1" href="{{ url('level')
            }}">Kembali</a>
        </div>
    </div>
       
    </form>
</div>

@endsection