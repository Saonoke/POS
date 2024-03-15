<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Hash;

class UserController extends Controller
{
    //

    public function index()
    {
        // $data = [
        //     'username' => 'Customer-1',
        //     'nama' => 'pelanggan',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 3
        // ];
        // UserModel::insert($data);

        // $data = [
        //     'level_id' => 2,
        //     'username' => 'manager_tiga',
        //     'nama' => 'manager 3',
        //     'password' => Hash::make('12345')
        // ];

        // $user = UserModel::create($data);


        // $user = UserModel::all();
        // $user = UserModel::findOr(20, ['username', 'nama'], function () {
        //     abort(404);
        // });

        // $user = UserModel::findOrFail(1);
        $user = UserModel::where('username', 'manager9')->firstOrFail();

        // $user = UserModel::where('level_id', 2)->count();


        return view('user.user', ['data' => $user]);
    }
}
