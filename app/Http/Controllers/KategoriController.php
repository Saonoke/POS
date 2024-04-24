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
        $breadcrumb = (object) [
            'title' => 'Home Kategori',
            'list' => ['Home', 'Kategori']
        ];

        $page = (object) [

            'title' => 'Home Kategori'

        ];


        $activeMenu = 'kategori';
        return $dataTable->render('kategori.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    public function delete($id)
    {
        $data = KategoriModel::find($id);

        $data->delete();
        return redirect('/kategori');
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Kategori',
            'list' => ['Home', 'Kategori', 'Tambah']
        ];

        $page = (object) [

            'title' => 'Tambah Kategori'

        ];


        $activeMenu = 'kategori';
        return view('kategori.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    public function edit($id)
    {
        $data = KategoriModel::find($id);
        $breadcrumb = (object) [
            'title' => 'Edit Kategori',
            'list' => ['Home', 'Kategori', 'Edit']
        ];

        $page = (object) [

            'title' => 'Edit Kategori'

        ];


        $activeMenu = 'kategori';

        return view('kategori.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'data' => $data]);
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
        $request->validated();

        KategoriModel::create(
            [
                'kategori_kode' => $request->kategori_kode,
                'kategori_nama' => $request->kategori_nama
            ]

        );
        return redirect('/kategori')->with('success', 'data berhasil ditambah');

    }


}
