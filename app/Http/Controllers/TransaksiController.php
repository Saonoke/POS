<?php

namespace App\Http\Controllers;

use App\Models\PenjualanModel;
use App\Models\StokModel;
use App\Models\TransaksiModel;
use App\Models\UserModel;
use App\Models\BarangModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $breadcrumb = (object) [
            'title' => 'Daftar Transaksi',
            'list' => ['Home', 'Transaksi']
        ];

        $page = (object) [

            'title' => 'Daftar transaksi yang terdaftar dalam sistem'

        ];

        $activeMenu = 'transaksi';

        return view('transaksi.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    /**
     * Show the form for creating a new resource.
     */


    public function list()
    {
        $transaksi = PenjualanModel::with('user')->get();

        return DataTables::of($transaksi)
            ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addColumn('aksi', function ($transaksi) { // menambahkan kolom aksi
                $btn = '<a href="' . url('/transaksi/' . $transaksi->penjualan_id) . '" class="btn btn-info btn-sm">Detail</a> ';

                $btn .= '<form class="d-inline-block" method="POST" action="' .
                    url('/transaksi/' . $transaksi->penjualan_id) . '">'
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
            'title' => 'Tambah Transaksi',
            'list' => ['Home', 'Transaksi', 'Tambah']
        ];

        $page = (object) [

            'title' => 'Tambah Transaksi'

        ];

        $activeMenu = 'transaksi';

        $barang = BarangModel::select('barang_id', 'barang_nama', "harga_jual")->get();
        $user = UserModel::select('user_id', 'username')->get();


        return view('transaksi.create', ['breadcrumb' => $breadcrumb, 'barang' => $barang, 'user' => $user, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $stok = StokModel::where('barang_id', $request->barang_id)->first();



        $kode = 'PNJL' . strval(random_int(30, 100));

        $tes = PenjualanModel::create([
            'user_id' => $request->user_id,
            'pembeli' => $request->pembeli,
            'penjualan_kode' => $kode,
            'penjualan_tanggal' => $request->penjualan_tanggal
        ]);
        $i = 0;
        foreach ($request->barang_id as $barang) {
            $stok = StokModel::where('barang_id', $request->barang_id[$i])->first();


            if ($stok->stok_jumlah >= $request->jumlah[$i]) {
                TransaksiModel::create(
                    [
                        'penjualan_id' => $tes->penjualan_id,
                        'barang_id' => $request->barang_id[$i],
                        'jumlah' => $request->jumlah[$i],
                        'harga' => $request->harga[$i]
                    ]
                );
            } else {
                PenjualanModel::where('penjualan_kode', $kode)->first()->delete();
                return redirect('/transaksi')->with('error', 'Stok tidak memenuhi');
            }


            $stok = StokModel::where('barang_id', $request->barang_id[$i])->first();
            $stok->stok_jumlah -= ($request->jumlah[$i]);
            $stok->save();
            $i++;
        }






        return redirect('/transaksi')->with('success', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $transaksi = TransaksiModel::with(['penjualan.user', 'barang'])->where('penjualan_id', $id)->get();

        $breadcrumb = (object) [
            'title' => 'Detail Transaksi',
            'list' => ['Home', 'Transaksi', 'Detail']
        ];

        $page = (object) [

            'title' => 'Detail Transaksi yang terdaftar dalam sistem'

        ];
        $total = 0;
        foreach ($transaksi as $item) {
            $total += ($item->harga * $item->jumlah);

        }

        $activeMenu = 'transaksi';

        return view('transaksi.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'transaksi' => $transaksi, 'total' => $total, 'activeMenu' => $activeMenu]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $transaksi = TransaksiModel::with(['penjualan.user', 'barang'])->find($id);
        $user = UserModel::select('user_id', 'username')->get();
        $barang = BarangModel::select('barang_id', 'barang_nama')->get();

        $breadcrumb = (object) [
            'title' => 'Edit Transaksi',
            'list' => ['Home', 'Transaksi', 'Edit']
        ];

        $page = (object) [

            'title' => 'Edit Transaksi'

        ];

        $activeMenu = 'transaksi';


        return view('transaksi.edit', ['breadcrumb' => $breadcrumb, 'barang' => $barang, 'user' => $user, 'page' => $page, 'transaksi' => $transaksi, 'activeMenu' => $activeMenu]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $transaksi = TransaksiModel::findOrFail($id);
        PenjualanModel::findOrFail($transaksi->penjualan_id)->update([
            'user_id' => $request->user_id,
            'pembeli' => $request->pembeli,
            'tanggal_transaksi' => $request->tanggal_transaksi
        ]);

        $transaksi->update(
            [
                'barang_id' => $request->barang_id,
                'jumlah' => $request->jumlah,
                'harga' => $request->harga
            ]
        );



        return redirect('/transaksi')->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $transaksi = TransaksiModel::where('penjualan_id', $id);
        $transaksi->delete();
        PenjualanModel::findOrFail($id)->deleteOrFail();


        return redirect('/transaksi')->with('success', 'Data Berhasil Dihapus');
    }
}
