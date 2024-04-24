<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //

    public function index()
    {
        $breadcumb = (object) [
            'title' => 'Selamat Datang',
            'list' => ['Home', 'Welcome']
        ];

        $activemenu = 'dashboard';
        return view('welcome', ['breadcrumb' => $breadcumb, 'activeMenu' => $activemenu]);
    }
}
