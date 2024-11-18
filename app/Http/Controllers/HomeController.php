<?php

namespace App\Http\Controllers;

use App\Models\CCTV;
use App\Http\Controllers\cctvController;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $cctv = cctv::all();
        return view('welcome', compact('cctv'));
    }
}
