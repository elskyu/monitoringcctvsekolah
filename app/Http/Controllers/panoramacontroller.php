<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Panorama;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

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
        $validator = Validator::make($request->all(), [
            'namaWilayah' => 'required',
            'namaTitik' => 'required',
            'link' => [
                'required',
                'url',
                Rule::unique('panorama', 'link'), // pastikan 'panoramas' adalah nama tabelmu
            ],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('validation_error', true);
        }

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

    public function update(Request $request, $id)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'namaWilayah' => 'required',
            'namaTitik' => 'required',
            'link' => [
                'required',
                'url',
                Rule::unique('panorama', 'link')->ignore($id), // Ignore ID yang lagi diedit
            ],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('validation_error', true);
        }

        // Cari data panorama
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
        return redirect()->route('panorama.index')->with('success', 'CCTV Panorama berhasil Dihapus.');
    }
}

?>
