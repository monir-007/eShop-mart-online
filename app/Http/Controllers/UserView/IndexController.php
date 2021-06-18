<?php

namespace App\Http\Controllers\UserView;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('user-view.index');
    }
}
