<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticate;

class MainController extends Controller
{
    public function index()
    {
        return view('admin.user.home', [
            'title' => 'Home',
        ]);
    }
}
