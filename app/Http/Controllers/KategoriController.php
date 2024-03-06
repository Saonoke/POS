<?php

namespace App\Http\Controllers;

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


    public function index()
    {
        $data = DB::table('m_kategori')->get();
        return view('kategori.kategori', ['data' => $data]);
    }
}
