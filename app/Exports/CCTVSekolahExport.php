<?php

namespace App\Exports;

use App\Models\Sekolah;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CCTVSekolahExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Sekolah::whereNotNull('link')->get();
    }

    public function headings(): array
    {
        return [
            'Nama Wilayah',
            'Nama Sekolah',
            'Nama Titik',
            'Link CCTV',
            'Tanggal Dibuat',
            'Tanggal Diupdate',
        ];
    }

    public function map($sekolah): array
    {
        return [
            $sekolah->namaWilayah,
            $sekolah->namaSekolah,
            $sekolah->namaTitik,
            $sekolah->link,
            $sekolah->created_at->format('Y-m-d H:i:s'),
            $sekolah->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}