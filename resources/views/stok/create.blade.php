@extends('layout.template')
@section('content')
<div class="card card-outline card-primary">
<div class="card-header">
<h3 class="card-title">{{ $page->title }}</h3>
<div class="card-tools"></div>
</div>
<div class="card-body">
<form method="POST" action="{{ url('stok') }}" class="form-horizontal">
@csrf

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<div class="form-group row">
<label class="col-1 control-label col-form-label">Nama Barang</label>
<div class="col-11">
    <select name="barang_id" id="">
        @foreach ($barang as $item)
                <option value="{{$item->barang_id}}">{{$item->barang_nama}}</option>
        @endforeach

    </select>
@error('barang_id')
<small class="form-text text-danger">{{ $message }}</small>
@enderror
</div>
</div>

<div class="form-group row">
    <label class="col-1 control-label col-form-label">Nama User</label>
    <div class="col-11">
        <select name="user_id" id="">
            @foreach ($user as $item)
                    <option value="{{$item->user_id}}">{{$item->username}}</option>
            @endforeach
    
        </select>
    @error('user_id')
    <small class="form-text text-danger">{{ $message }}</small>
    @enderror
    </div>
    </div>


<div class="form-group row">
<label class="col-1 control-label col-form-label">Tanggal Stok</label>
<div class="col-11">
<input type="date" class="form-control" id="nama" name="stok_tanggal"
value="{{ old('nama') }}" required>
@error('stok_tanggal')
<small class="form-text text-danger">{{ $message }}</small>
@enderror
</div>
</div>
<div class="form-group row">
<label class="col-1 control-label col-form-label">Jumlah Stok</label>
<div class="col-11">
<input type="number" class="form-control" id="password"
name="stok_jumlah" required>
@error('stok_jumlah')
<small class="form-text text-danger">{{ $message }}</small>
@enderror
</div>
</div>
<div class="form-group row">
<label class="col-1 control-label col-form-label"></label>
<div class="col-11">
<button type="submit" class="btn btn-primary btn-sm">Simpan</button>
<a class="btn btn-sm btn-default ml-1" href="{{ url('user')
}}">Kembali</a>
</div>
</div>
 </form>
</div>
</div>
@endsection
@push('css')
@endpush
@push('js')
@endpush