<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\StokModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $breadcrumb = (object) [
            'title' => 'Daftar Stok',
            'list' => ['Home', 'Stok']
        ];

        $page = (object) [

            'title' => 'Daftar stok yang terdaftar dalam sistem'

        ];

        $activeMenu = 'stok';

        return view('stok.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);

    }

    /**
     * Show the form for creating a new resource.
     */

    public function list()
    {
        $stok = StokModel::with(['barang', 'user'])->get();


        return DataTables::of($stok)
            ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addColumn('aksi', function ($stok) { // menambahkan kolom aksi
                $btn = '<a href="' . url('/stok/' . $stok->stok_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/stok/' . $stok->stok_id . '/edit') . '"
class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' .
                    url('/stok/' . $stok->stok_id) . '">'
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
        $breadcrumb = (object) [
            'title' => 'Tambah Stok',
            'list' => ['Home', 'Stok', 'Tambah']
        ];

        $page = (object) [

            'title' => 'Tambah Stok'

        ];

        $activeMenu = 'stok';

        $barang = BarangModel::select('barang_id', 'barang_nama')->get();
        $user = UserModel::select('user_id', 'username')->get();


        return view('stok.create', ['breadcrumb' => $breadcrumb, 'barang' => $barang, 'user' => $user, 'page' => $page, 'activeMenu' => $activeMenu]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //  

        $stok = StokModel::where('barang_id', $request->barang_id)->first();

        $request->validate([
            'barang_id' => 'required',
            'user_id' => 'required',
            'stok_tanggal' => 'required',
            'stok_jumlah' => 'required',
        ]);



        if ($stok == null) {
            StokModel::create(
                [
                    'barang_id' => $request->barang_id,
                    'user_id' => $request->user_id,
                    'stok_tanggal' => $request->stok_tanggal,
                    'stok_jumlah' => $request->stok_jumlah,
                ]


            );
        } else {
            $stok->stok_jumlah += $request->stok_jumlah;
            $stok->user_id = $request->user_id;
            $stok->save();

        }



        return redirect('/stok')->with('success', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

        $stok = StokModel::with(['barang', 'user'])->find($id);
        $breadcrumb = (object) [
            'title' => 'Detail Stok',
            'list' => ['Home', 'Stok', 'Detail']
        ];

        $page = (object) [

            'title' => 'Detail Stok yang terdaftar dalam sistem'

        ];

        $activeMenu = 'stok';

        return view('stok.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'stok' => $stok, 'activeMenu' => $activeMenu]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $stok = StokModel::with(['barang', 'user'])->find($id);
        $barang = BarangModel::select('barang_id', 'barang_nama')->get();
        $user = UserModel::select('user_id', 'username')->get();

        $breadcrumb = (object) [
            'title' => 'Edit Stok',
            'list' => ['Home', 'Stok', 'Edit']
        ];

        $page = (object) [

            'title' => 'Edit Stok'

        ];

        $activeMenu = 'stok';

        return view('stok.edit', ['breadcrumb' => $breadcrumb, 'barang' => $barang, 'user' => $user, 'page' => $page, 'stok' => $stok, 'activeMenu' => $activeMenu]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //


        $request->validate([
            'barang_id' => 'required',
            'user_id' => 'required',
            'stok_tanggal' => 'required',
            'stok_jumlah' => 'required',
        ]);

        StokModel::findOrFail($id)->update($request->all());

        return redirect('/stok')->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $level = StokModel::find($id);

        if (!$level) {
            return redirect('/stok')->with('error', 'Data tidak ada');
        }

        try {
            StokModel::destroy($id);
            return redirect('/stok')->with('success', 'Data berhasil dihapus');
        } catch (e) {
            return redirect('/stok')->with('error', 'Data user gagal dihapus karena masih terdapat tabel lain yang terkait ');
        }
    }
}
