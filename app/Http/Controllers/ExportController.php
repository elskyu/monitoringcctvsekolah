<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\CCTVPanoramaExport;
use App\Exports\CCTVSekolahExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function form()
    {
        return view('export.rekap');
    }

    public function export(Request $request)
    {
        $tipe = $request->input('tipe');

        if ($tipe == 'panorama') {
            return Excel::download(new CCTVPanoramaExport, 'rekap_cctv_panorama.xlsx');
        } elseif ($tipe == 'sekolah') {
            return Excel::download(new CCTVSekolahExport, 'rekap_cctv_sekolah.xlsx');
        }

        return redirect()->back()->with('error', 'Pilihan tidak valid.');
    }
}