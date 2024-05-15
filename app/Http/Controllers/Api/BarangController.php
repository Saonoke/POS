<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BarangModel;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    //
    public function index()
    {
        return BarangModel::all();
    }

    public function store(Request $request)
    {



        $level = BarangModel::create([
            'kategori_id' => $request->kategori_id,
            'barang_kode' => $request->barang_kode,
            'image' => $request->image->hashname(),
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'barang_nama' => $request->barang_nama,

        ]);
        return response()->json([
            $level
        ], 201);
    }

    public function show(BarangModel $level)
    {
        return BarangModel::find($level);
    }

    public function update(Request $request, BarangModel $level)
    {
        $level->update($request->all());
        return BarangModel::find($level);
    }

    public function destroy(BarangModel $level)
    {
        $level->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data Terhapus'
        ]);
    }
}
