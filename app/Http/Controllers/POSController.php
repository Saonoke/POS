<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;

class POSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $useri = UserModel::with('level')->get();
        return view('m_user.index', compact('useri'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('m_user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'user_id' => 'max 20',
            'username' => 'required',
            'nama' => 'required'
        ]);

        UserModel::create($request->all());
        return redirect()->route('m_user.index')->with('success', 'user berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $useri = UserModel::findOrFail($id);
        return view('m_user.show', compact('useri'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $useri = UserModel::find($id);
        return view('m_user.edit', compact('useri'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate(
            [
                'username' => 'required',
                'nama' => 'required',
                'password' => 'required'
            ]
        );

        UserModel::find($id)->update($request->all());
        return redirect()->route('m_user.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $useri = UserModel::findOrFail($id)->delete();
        return redirect()->route('m_user.index')->with('success', 'data berhasil dihapus');
    }


}
