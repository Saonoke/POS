<?php

namespace App\Http\Controllers;

use App\Http\Requests\LevelRequest;
use Illuminate\Http\Request;
use DB;

class LevelController extends Controller
{
    // //
    // public function index()
    // {
    //     DB::insert('insert into m_level(level_kode,level_nama,created_at) values(?,?,?)', ['CUS', 'Pelanggan', now()]);

    //     return 'Insert data baru berhasil';
    // }
    // public function index()
    // {
    //     DB::update('update m_level set level_nama=? where level_kode = ?', ['Customer', 'CUS']);

    //     return 'Update data baru berhasil';
    // }

    // public function index()
    // {
    //     $row = DB::delete('delete from m_level where level_kode = ?', ['cus']);

    //     return 'Delete data berhasil. jumlah data yang dihapus ' . $row . ' baris';
    // }

    public function index()
    {
        $data = DB::select('select * from m_level');

        return view('level.level', ['data' => $data]);
    }

    public function store(LevelRequest $request)
    {
        $request->validated();

        return redirect('/kategori');

    }



}
