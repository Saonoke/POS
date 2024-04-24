@extends('layout.template')
@section('content')
<div class="card card-outline card-primary">
<div class="card-header">
<h3 class="card-title">{{ $page->title }}</h3>
<div class="card-tools"></div>
</div>
<div class="card-body">
<form method="POST" action="{{ url('transaksi') }}" class="form-horizontal">
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
        <label class="col-1 control-label col-form-label">Nama User</label>
        <div class="col-11">
            <select name="user_id" id="">
                <option value="">Pilih User</option>
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
            <label class="col-1 control-label col-form-label">Nama Pembeli</label>
            <div class="col-11">
                <input type="text" name="pembeli"  id="">
            @error('user_id')
            <small class="form-text text-danger">{{ $message }}</small>
            @enderror
            </div>
            </div>
    
    
    <div class="form-group row">
    <label class="col-1 control-label col-form-label">Tanggal Transaksi</label>
    <div class="col-11">
    <input type="date" class="form-control" id="nama" name="penjualan_tanggal"
     required>
    @error('penjualan_tanggal')
    <small class="form-text text-danger">{{ $message }}</small>
    @enderror
    </div>
    </div>

  



    <button type="button" onclick="tambahBarang()"  class="btn btn-primary" >Tambah Barang +</button>

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
            <tr id="content">
                <td>
                    <div class="">
                        <select id="barang" onchange="updateHarga()" class="form-select" name="barang_id[]" id="">
                            <option  value="">Pilih barang</option>
                            @foreach ($barang as $item)
           
                                    <option data-harga="{{$item->harga_jual}}" value="{{$item->barang_id}}" >{{$item->barang_nama}}</option>
                            @endforeach
                    
                        </select>

                      </div>
                @error('barang_id')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
                </td>
                <td>
                    <input readonly type="number" class="form-control" id="harga"
                    name="harga[]"  required>
                    @error('harga')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </td>
                <td>
                    <input type="number" class="form-control" 
                    name="jumlah[]"  required>
                    @error('jumlah')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </td>
         
            </tr>
        </tbody>
        </table>
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
<script>

    function updateHarga() {
            let konten = document.querySelectorAll('#content');
        konten.forEach(input => {
                const harga = input.querySelector('#barang');
                const harga_input = input.querySelector('#harga');

                console.log(harga.options[harga.selectedIndex].getAttribute('data-harga'));
                harga_input.value= harga.options[harga.selectedIndex].getAttribute('data-harga');
                
               
        });

    }

    function tambahBarang() {
            const table= document.getElementById('table');
       
            const node = document.getElementById("content");
            console.log(node);
            const clone = node.cloneNode(true);
            clone.querySelector('#harga').value='';
            
            table.appendChild(clone);
 }
</script>
@endpush
