@extends('layout.app')

@section('subtitle','Kategori')
@section('content_header_title','kategori')
@section('content_header_subtitle','create')

@section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Buat kategori baru</h3>
            </div>
            <form action="{{route('create')}}" method="post">
                @csrf
                @method('POST')
                {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}
                <div class="card-body">
                    <div class="form-group">
                        <label for="kodeKategori">Kode Kategori</label>
                        <input type="text" name="kodeKategori" placeholder="kode kategori" id="kodeKategori" class="@error('kategori_kode') is-invalid @enderror" >

                        @error('kategori_kode')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="namaKategori">Nama Kategori</label>
                        <input type="text" name="namaKategori" placeholder="nama kategori" id="">
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" >Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection

