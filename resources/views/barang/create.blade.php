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
    <form action="{{url('barang')}}" method="post" class="form-horizontal">
        @csrf
        @method('POST')
        <div class="col-xs-12 col-sm-12 col-md-12 mt-5">
            <div class="form-group row">
               <label  class="col-1 control-label col-form-label" for="barang_kode">barang Kode :</label>
               <div class="col-11">
                <input type="text" name="barang_kode" class="form-control" placeholder="Masukkan kode barang" id="">
               </div>
               
            </div>  
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group row">
                <label for="barang_nama"  class="col-1 control-label col-form-label" >barang Nama :</label>
                <div class="col-11">

                    <input type="text" name="barang_nama" class="form-control" placeholder="Masukkan kode nama" id="">
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group row">
                <label for="kategori"  class="col-1 control-label col-form-label" >Kategori :</label>
                <div class="col-11">

                   <select name="kategori_id" id="">
                    @foreach ($kategori as $item)
                    <option value="{{$item->kategori_id}}">{{$item->kategori_nama}}</option>
                    @endforeach

                   </select>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group row">
                <label for="harga_jual"  class="col-1 control-label col-form-label" >Harga Jual :</label>
                <div class="col-11">

                    <input type="text" name="harga_jual" class="form-control" placeholder="Masukkan kode nama"  id="">
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group row">
                <label for="harga_beli"  class="col-1 control-label col-form-label" >Harga Beli :</label>
                <div class="col-11">

                    <input type="text" name="harga_beli" class="form-control" placeholder="Masukkan kode nama" id="">
                </div>
            </div>
        </div>
    <div class="form-group row">
        <label for="barang_nama"  class="col-1 control-label col-form-label" ></label>
        <div class="col-11">
            <button type="submit" class="btn btn-primary btn-sm ">Simpan</button>
            <a class="btn btn-sm btn-default ml-1" href="{{ url('barang')
            }}">Kembali</a>
        </div>
    </div>
       
    </form>
</div>

@endsection