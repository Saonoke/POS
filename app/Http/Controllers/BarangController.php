<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\KategoriModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $kategori = KategoriModel::all();

        $breadcrumb = (object) [
            'title' => 'Home Barang',
            'list' => ['Home', 'Barang']
        ];

        $page = (object) [

            'title' => 'Home Barang'

        ];


        $activeMenu = 'barang';

        return view('barang.index', ['breadcrumb' => $breadcrumb, 'kategori' => $kategori, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    /**
     * Show the form for creating a new resource.
     */


    public function list(Request $request)
    {
        $barang = BarangModel::select('barang_kode', 'barang_nama', 'kategori_id', 'harga_beli', 'harga_jual')->with('kategori');

        if ($request->kategori_id) {
            $barang->where('kategori_id', $request->kategori_id);
        }

        return DataTables::of($barang)
            ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addColumn('aksi', function ($barang) { // menambahkan kolom aksi
                $btn = '<a href="' . url('/barang/' . $barang->barang_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/barang/' . $barang->barang_id . '/edit') . '"
class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' .
                    url('/barang/' . $barang->barang_id) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm"
onclick="return confirm(\'Apakah Anda yakit menghapus data
ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
            ->make(true);
    }

    public function create()
    {
        //
        $kategori = KategoriModel::all();
        $breadcrumb = (object) [
            'title' => 'Tambah Barang',
            'list' => ['Home', 'Barang', 'Tambah']
        ];

        $page = (object) [

            'title' => 'Tambah Barang'

        ];


        $activeMenu = 'barang';

        return view('barang.create', ['breadcrumb' => $breadcrumb, 'kategori' => $kategori, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'kategori_id' => 'required',
            'barang_kode' => 'required',
            'barang_nama' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required'
        ]);

        BarangModel::create(
            [
                'kategori_id' => $request->kategori_id,
                'barang_kode' => $request->barang_kode,
                'barang_nama' => $request->barang_nama,
                'harga_beli' => $request->harga_beli,
                'harga_jual' => $request->harga_jual
            ]
        );

        return redirect('/barang')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $breadcrumb = (object) [
            'title' => 'Detail Barang',
            'list' => ['Home', 'Barang', 'Detail']
        ];

        $page = (object) [

            'title' => 'Detail Barang'

        ];


        $activeMenu = 'barang';

        $barang = BarangModel::with('kategori')->find($id);

        return view('barang.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'barang' => $barang]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //

        $breadcrumb = (object) [
            'title' => 'Edit Barang',
            'list' => ['Home', 'Barang', 'Edit']
        ];

        $page = (object) [

            'title' => 'Edit Barang'

        ];


        $activeMenu = 'barang';

        $barang = BarangModel::find($id);

        return view('barang.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'barang' => $barang]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $request->validate([

            'barang_kode' => 'required',
            'barang_nama' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required'
        ]);

        BarangModel::find($id)->update(
            $request->all()
        );

        return redirect('/barang')->with('success', 'Data berhasil diupdate');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $barang = BarangModel::findOrFail($id)->delete();

        return redirect('/barang')->with('success', 'data berhasil dihapus');

    }
}
