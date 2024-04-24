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
@else
<table class="table table-bordered table-striped table-hover tablesm">
    <tr>
        <th>Kode Penjualan</th>
        <td>{{ $transaksi[0]->penjualan->penjualan_kode }}</td>
        </tr>
<tr>
<th>Nama User</th>
<td>{{ $transaksi[0]->penjualan->user->username }}</td>
</tr>
<tr>
    <th>Pembeli</th>
    <td>{{ $transaksi[0]->penjualan->pembeli }}</td>
    </tr>
<tr>
    
<th>Tanggal Transaksi</th>
<td>{{ $transaksi[0]->penjualan->penjualan_tanggal }}</td>
</tr>

    


</table>
<h1>Detail Transaksi</h1>

<div class="mt-3">
    <table  class="table table-striped">
        <thead>
        <tr>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Qty</th>
   
        </tr>
    </thead>
    <tbody id="table">
        @foreach ($transaksi as $item)
        <tr id="content">
            <td>{{$item->barang->barang_nama}}</td>
            <td>{{$item->harga}}</td>
            <td>{{$item->jumlah}}</td>
        </tr>
        @endforeach
      <tr>
        <td>Total</td>
        <td>
            
        </td>
        <td>{{$total}}</td>
      </tr>
    </tbody>
    </table>
@endempty
<a href="{{ url('transaksi') }}" class="btn btn-sm btn-default mt2">Kembali</a>
</div>
</div>
@endsection
@push('css')
@endpush
@push('js')
@endpush
