<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cctv;

class cctvController extends Controller
{
    public function index()
    {
        $cctv = cctv::all();
        return view('cctv.index', compact('cctv'));
    }
}
