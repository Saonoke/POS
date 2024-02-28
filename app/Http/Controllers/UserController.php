<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function user($id = null, $name = null)
    {
        return view('user.user', ['name' => $name, 'id' => $id]);
    }
}
