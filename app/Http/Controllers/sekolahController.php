<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sekolah;
use App\Models\Panorama;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class SekolahController extends Controller
{
    public function dashboard()
    {
        // Jumlah total
        $sekolahCount = Sekolah::count();
        $panoramaCount = Panorama::count();
        $userCount = User::count();

        // Statistik jumlah sekolah per wilayah
        $jumlahSekolahPerWilayah = Sekolah::select('namaWilayah', DB::raw('COUNT(DISTINCT namaSekolah) as total_sekolah'))
            ->groupBy('namaWilayah')
            ->get();

        // Statistik jumlah CCTV per wilayah
        $jumlahCCTVPerWilayah = Sekolah::select('namaWilayah', DB::raw('COUNT(link) as total_cctv'))
            ->whereNotNull('link')
            ->groupBy('namaWilayah')
            ->get();

        // Statistik jumlah CCTV per sekolah
        $jumlahCCTVPerSekolah = Sekolah::select('namaSekolah', DB::raw('COUNT(link) as total_cctv'))
            ->whereNotNull('link')
            ->groupBy('namaSekolah')
            ->get();

        return view('admin.dashboard', compact(
            'sekolahCount', 'panoramaCount', 'userCount',
            'jumlahSekolahPerWilayah', 'jumlahCCTVPerWilayah', 'jumlahCCTVPerSekolah'
        ));
    }

    public function cctvsekolah()
    {
        $sekolah = sekolah::all();
        
        $jumlahwilayah = sekolah::select('namaWilayah', DB::raw('count(*) as total'))
        ->groupBy('namaWilayah')
        ->get();
        $jumlahsekolah = sekolah::select('namaSekolah', DB::raw('count(*) as total'))
        ->groupBy('namaSekolah')
        ->get();
        $jumlahcctv = sekolah::select('link', DB::raw('count(*) as total'))
        ->groupBy('link')
        ->get();

        return view('sekolah.sekolah', compact('sekolah','jumlahwilayah','jumlahsekolah', 'jumlahcctv'));
    }

    public function index()
    {
        $sekolah = sekolah::paginate(10);
        return view('sekolah.menu-sekolah', compact('sekolah'));
    }

    public function create()
    {
        return view('sekolah.create');
    }

    public function store(Request $request)
    {
        $sekolah = new sekolah;
        $sekolah->namaWilayah = $request->namaWilayah;
        $sekolah->namaSekolah = $request->namaSekolah;
        $sekolah->namaTitik = $request->namaTitik;
        $sekolah->link = $request->link;
        $sekolah->save();
        return redirect()->route('sekolah.index');
    }

    public function edit($id)
    {
        $sekolah = sekolah::find($id);
        return view('sekolah.edit', compact('sekolah'));
    }

    public function update(Request $request, $id)
    {
        $sekolah = sekolah::find($id);
        $sekolah->namaWilayah = $request->namaWilayah;
        $sekolah->namaSekolah = $request->namaSekolah;
        $sekolah->namaTitik = $request->namaTitik;
        $sekolah->link = $request->link;
        $sekolah->save();
        return redirect()->route('sekolah.index');
    }

    public function delete($id)
    {
        $sekolah = sekolah::find($id);
        $sekolah->delete();
        return redirect()->route('sekolah.index');
    }

    public function checkDuplicate(Request $request)
    {
        $field = $request->get('field'); // namaTitik atau link
        $value = $request->get('value');
        $exists = sekolah::where($field, $value)->exists();
        return response()->json(['exists' => $exists]);
    }

    public function getWilayah()
    {
        $sekolah = sekolah::select('namaWilayah')->distinct()->get(); // Ambil hanya kolom namaWilayah
        return response()->json($sekolah);
    }
}
