@extends('layout.app')

@section('subtitle','Kategori')
@section('content_header_title','kategori')
@section('content_header_subtitle','update')

@section('content')


    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Buat kategori baru</h3>
            </div>
            <form action="{{route('update',$data['kategori_id'])}}" method="post">
                @csrf
                @method('PUT')

                <div class="card-body">
                   
                    <div class="form-group">
                        <label for="kodeKategori">Kode Kategori</label>
                        <input type="text" name="kodeKategori" placeholder="kode kategori" id="" value="{{$data['kategori_kode']}}">
                    </div>
                    <div class="form-group">
                        <label for="namaKategori">Nama Kategori</label>
                        <input type="text" name="namaKategori" placeholder="nama kategori" id="" value="{{$data['kategori_nama']}}">
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" >Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection

