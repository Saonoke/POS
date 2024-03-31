<?php

namespace App\Http\Controllers;

use App\DataTables\KategoriDataTable;
use App\Http\Requests\StorePostRequest;
use App\Models\KategoriModel;
use DB;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    //
    // public function index()
    // {
    //     $data = [
    //         'kategori_kode' => 'SNK',
    //         'kategori_nama' => 'Snack/Makanan Ringan',
    //         'created_at' => now()
    //     ];
    //     DB::table('m_kategori')->insert($data);
    //     return "insert data baru berhasil";
    // }

    // public function index()
    // {

    //     $row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->update(['kategori_nama' => 'Camilan']);
    //     return 'Update Data Berhasil. Jumlah data yang diupdate: ' . $row . ' baris';
    // }

    // public function index()
    // {

    //     $row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->delete();
    //     return 'Update Data Berhasil. Jumlah data yang diupdate: ' . $row . ' baris';
    // }


    public function index(KategoriDataTable $dataTable)
    {
        return $dataTable->render('kategori.index');
    }

    public function delete($id)
    {
        $data = KategoriModel::find($id);

        $data->delete();
        return redirect('/kategori');
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function edit($id)
    {
        $data = KategoriModel::find($id);

        return view('kategori.edit', ['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $data = KategoriModel::find($id);

        $data->kategori_kode = $request->kodeKategori;
        $data->kategori_nama = $request->namaKategori;

        $data->save();
        return redirect('/kategori');


    }

    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();

        $validated = $request->safe()->only(['kategori_kode', 'kategori_nama']);
        $validated = $request->safe()->except(['kategori_kode', 'kategori_nama']);


        KategoriModel::create(
            [
                'kategori_kode' => $request->kodeKategori,
                'kategori_nama' => $request->namaKategori
            ]

        );
        return redirect('/kategori');

    }


}
