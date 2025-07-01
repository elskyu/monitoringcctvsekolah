<?php

namespace App\Exports;

use App\Models\Panorama;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PanoramaExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Panorama::whereNotNull('link')->get();
    }

    public function headings(): array
    {
        return [
            'Nama Wilayah',
            'Nama Titik',
            'Link CCTV',
            'Status',
            'Tanggal Dibuat',
            'Tanggal Diupdate',
        ];
    }

    public function map($panorama): array
    {
        return [
            $panorama->namaWilayah,
            $panorama->namaTitik,
            $panorama->link,
            $panorama->status,
            $panorama->created_at->format('Y-m-d H:i:s'),
            $panorama->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}