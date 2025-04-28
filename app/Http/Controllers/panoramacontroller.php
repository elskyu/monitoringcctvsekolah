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
        // Validasi input
        $request->validate([
            'namaWilayah' => 'required',
            'namaTitik' => 'required',
            'link' => 'required|url',  // Pastikan tabel yang benar digunakan dalam validasi unique
        ]);

        // Simpan data panorama baru
        $panorama = new Panorama();
        $panorama->namaWilayah = $request->namaWilayah;
        $panorama->namaTitik = $request->namaTitik;
        $panorama->link = $request->link;

        if ($panorama->save()) {
            // Menambahkan session sukses
            return redirect()->route('panorama.index')->with('success', 'CCTV Panorama berhasil ditambahkan.');
        } else {
            // Menambahkan session error
            return redirect()->route('panorama.index')->with('error', 'Gagal menambahkan CCTV Panorama.');
        }
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'namaWilayah' => 'required',
            'namaTitik' => 'required',
            'link' => 'required|url', // Sesuaikan dengan aturan validasi yang dibutuhkan
        ]);

        // Cari data panorama yang akan diperbarui
        $panorama = Panorama::find($id);
        if ($panorama) {
            $panorama->namaWilayah = $request->namaWilayah;
            $panorama->namaTitik = $request->namaTitik;
            $panorama->link = $request->link;
            
            if ($panorama->save()) {
                return redirect()->route('panorama.index')->with('success', 'CCTV Panorama berhasil diperbarui.');
            } else {
                return redirect()->route('panorama.index')->with('error', 'Gagal memperbarui CCTV Panorama.');
            }
        } else {
            return redirect()->route('panorama.index')->with('error', 'Data tidak ditemukan.');
        }
    }

    public function delete($id)
    {
        $panorama = Panorama::find($id);  
        $panorama->delete();
        return redirect()->route('panorama.index');
    }
}

?>
