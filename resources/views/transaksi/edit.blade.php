@extends('layout.template')
@section('content')
<div class="card card-outline card-primary">
<div class="card-header">
<h3 class="card-title">{{ $page->title }}</h3>
<div class="card-tools"></div>
</div>
<div class="card-body">
@empty($transaksi)
<div class="alert alert-danger alert-dismissible">
<h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
Data yang Anda cari tidak ditemukan.
</div>
<a href="{{ url('transaksi') }}" class="btn btn-sm btn-default mt2">Kembali</a>
@else
<form method="POST" action="{{ url('/transaksi/'.$transaksi->detail_id) }}"
class="form-horizontal">
@csrf
{!! method_field('PUT') !!} <!-- tambahkan baris ini untuk proses edit
yang butuh method PUT -->

<div class="form-group row">
    <label class="col-1 control-label col-form-label">Nama Barang</label>
    <div class="col-11">
        <select name="barang_id" id="">
            @foreach ($barang as $item)
                    <option value="{{$item->barang_id}}" {{$transaksi->barang->barang_id == $item->barang_id ? "selected":''}} >{{$item->barang_nama}}</option>
            @endforeach
    
        </select>
    @error('barang_id')
    <small class="form-text text-danger">{{ $message }}</small>
    @enderror
    </div>
    </div>

    {{$transaksi->penjualan->user->user_id}}
    
    <div class="form-group row">
        <label class="col-1 control-label col-form-label">Nama User</label>
        <div class="col-11">
            <select name="user_id" id="">
                @foreach ($user as $item)
                        <option value="{{$item->user_id}}"  {{$transaksi->penjualan->user->user_id == $item->user_id ? "selected":''}} >{{$item->username}}</option>
                @endforeach
        
            </select>
        @error('user_id')
        <small class="form-text text-danger">{{ $message }}</small>
        @enderror
        </div>
        </div>

        <div class="form-group row">
            <label class="col-1 control-label col-form-label">Nama Pembeli</label>
            <div class="col-11">
                <input type="text" name="pembeli" value="{{old('pembeli',$transaksi->penjualan->pembeli)}}" id="">
            @error('user_id')
            <small class="form-text text-danger">{{ $message }}</small>
            @enderror
            </div>
            </div>
    
    
    <div class="form-group row">
    <label class="col-1 control-label col-form-label">Tanggal Transaksi</label>
    <div class="col-11">
    <input type="datetime" class="form-control" id="nama" name="penjualan_tanggal"
    value="{{ old('stok_tanggal', $transaksi->penjualan->penjualan_tanggal)}}" required>
    @error('penjualan_tanggal')
    <small class="form-text text-danger">{{ $message }}</small>
    @enderror
    </div>
    </div>
    <div class="form-group row">
    <label class="col-1 control-label col-form-label">Jumlah </label>
    <div class="col-11">
    <input type="number" class="form-control" id="password"
    name="jumlah" value="{{ old('stok_jumlah', $transaksi->jumlah)}}" required>
    @error('jumlah')
    <small class="form-text text-danger">{{ $message }}</small>
    @enderror
    </div>
    </div>
    <div class="form-group row">
        <label class="col-1 control-label col-form-label">Harga </label>
        <div class="col-11">
        <input type="number" class="form-control" id="password"
        name="harga" value="{{ old('stok_jumlah', $transaksi->harga)}}" required>
        @error('harga')
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
@endempty
</div>
</div>
@endsection
@push('css')
@endpush
@push('js')
@endpush