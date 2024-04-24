<?php

namespace App\Http\Controllers;

use App\Http\Requests\LevelRequest;
use App\Models\UserModel;
use Illuminate\Http\Request;
use DB;
use Yajra\DataTables\DataTables;
use App\Models\LevelModel;

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
        $breadcrumb = (object) [
            'title' => 'Daftar Level',
            'list' => ['Home', 'Level']
        ];

        $page = (object) [

            'title' => 'Daftar Level yang terdaftar dalam sistem'

        ];

        $activeMenu = 'level';
        // $level = LevelModel::all();

        // dd($users = UserModel::find(1)
        //     ->with('level')->get());
        return view('level.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);


    }

    public function list(Request $request)
    {
        $level = LevelModel::all();


        return DataTables::of($level)
            ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addColumn('aksi', function ($level) { // menambahkan kolom aksi
                $btn = '<a href="' . url('/level/' . $level->level_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/level/' . $level->level_id . '/edit') . '"
class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' .
                    url('/level/' . $level->level_id) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm"
onclick="return confirm(\'Apakah Anda yakit menghapus data
ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
            ->make(true);
    }

    public function store(LevelRequest $request)
    {
        $request->validated();

        LevelModel::create([
            'level_kode' => $request->level_kode,
            'level_nama' => $request->level_nama,
        ]);

        return redirect('/level');

    }

    public function create()
    {

        $breadcrumb = (object) [
            'title' => 'Tambah Level',
            'list' => ['Home', 'Level', 'tambah']
        ];

        $page = (object) [

            'title' => 'Menambah Daftar Level'

        ];

        $activeMenu = 'level';
        return view('level.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    public function edit(string $id)
    {
        $level = LevelModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Edit User',
            'list' => ['Home', 'Level', 'edit']
        ];

        $page = (object) [

            'title' => 'Edit User'

        ];

        $activeMenu = 'level';

        return view('level.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
    }

    public function update(LevelRequest $request, string $id)
    {
        $request->validated();


        $level = LevelModel::find($id)->update(
            $request->all()
        );

        return redirect(url('/level'))->with('success', 'File berhasil di update');

    }

    public function show(string $id)
    {
        $level = LevelModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Level',
            'list' => ['Home', 'Level', 'Detail']
        ];

        $page = (object) [

            'title' => 'Detail Level'

        ];


        $activeMenu = 'level';

        return view('level.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
    }



    public function destroy(string $id)
    {
        $level = LevelModel::find($id);

        if (!$level) {
            return redirect('level')->with('error', 'Data tidak ada');
        }

        try {
            LevelModel::destroy($id);
            return redirect('/level')->with('success', 'Data berhasil dihapus');
        } catch (e) {
            return redirect('/level')->with('error', 'Data user gagal dihapus karena masih terdapat tabel lain yang terkait ');
        }
    }



}
