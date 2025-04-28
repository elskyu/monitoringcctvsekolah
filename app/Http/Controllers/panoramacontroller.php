<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Panorama;

class Panoramacontroller extends Controller
{
    public function dashboard()
    {
        $panorama = panorama::all();
        return view('panorama.panorama', compact('panorama'));
    }

    public function index()
    {
        $panorama = panorama::all();
        return view('panorama.index', compact('panorama'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaWilayah' => 'required',
            'namaTitik' => 'required',
            'link' => 'required|url',
        ]);

        $panorama = new Panorama();
        $panorama->namaWilayah = $request->namaWilayah;
        $panorama->namaTitik = $request->namaTitik;
        $panorama->link = $request->link;

        if ($panorama->save()) {
            return redirect()->route('panorama.index')->with('success', 'CCTV Panorama berhasil ditambahkan.');
        } else {
            return redirect()->route('panorama.index')->with('error', 'Gagal menambahkan CCTV Panorama.');
        }
    }
}

?>
