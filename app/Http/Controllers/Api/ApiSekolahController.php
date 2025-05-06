<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\GlobalResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\sekolah;
use Illuminate\Support\Facades\Validator;

class ApiSekolahController extends Controller
{
    public function index()
    {
        try {
            $sekolah = Sekolah::all();

            if ($sekolah->isEmpty()) {
                return new GlobalResource(false, 'Belum ada data cctv sekolah yang tersedia.', null);
            }

            return new GlobalResource(true, 'Data cctv sekolah berhasil dimuat.', $sekolah);
        } catch (\Exception $e) {
            return new GlobalResource(false, 'Terjadi kesalahan saat mengambil data cctv sekolah. Silakan coba lagi nanti.', null);
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'namaWilayah' => 'required|string|max:255',
                'namaSekolah' => 'required|string|max:255',
                'namaTitik' => 'required|string|max:255',
                'link' => 'required|url',
            ]);

            if ($validator->fails()) {
                return new GlobalResource(false, 'Data yang Anda masukkan tidak valid.', $validator->errors());
            }

            $sekolah = Sekolah::create($request->all());

            return new GlobalResource(true, 'Data cctv sekolah berhasil ditambahkan.', $sekolah);
        } catch (\Exception $e) {
            // Menangani error duplikat (misal karena constraint unik)
            if (str_contains($e->getMessage(), 'Duplicate entry')) {
                return new GlobalResource(false, 'Link CCTV sudah digunakan. Silakan gunakan link yang berbeda.', null);
            }

            return new GlobalResource(false, 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.', null);
        }
    }

    public function show(string $id)
    {
        try {
            $data = Sekolah::find($id);

            if (!$data) {
                return new GlobalResource(false, 'Data cctv sekolah tidak ditemukan.', null);
            }

            return new GlobalResource(true, 'Detail data cctv sekolah berhasil dimuat.', $data);
        } catch (\Exception $e) {
            return new GlobalResource(false, 'Terjadi kesalahan saat memuat data cctv sekolah.', null);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $data = Sekolah::find($id);

            if (!$data) {
                return new GlobalResource(false, 'Data sekolah tidak ditemukan.', null);
            }

            $validator = Validator::make($request->all(), [
                'namaWilayah' => 'required|string|max:255',
                'namaSekolah' => 'required|string|max:255',
                'namaTitik' => 'required|string|max:255',
                'link' => 'required|url',
            ]);

            if ($validator->fails()) {
                return new GlobalResource(false, 'Data yang Anda masukkan tidak valid.', $validator->errors());
            }

            $data->update($request->all());

            return new GlobalResource(true, 'Data cctv sekolah berhasil diperbarui.', $data);
        } catch (\Exception $e) {
            if (str_contains($e->getMessage(), 'Duplicate entry')) {
                return new GlobalResource(false, 'Link CCTV sudah digunakan. Silakan gunakan link yang berbeda.', null);
            }

            return new GlobalResource(false, 'Terjadi kesalahan saat memperbarui data cctv sekolah.', null);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = Sekolah::find($id);

            if (!$data) {
                return new GlobalResource(false, 'Data cctv sekolah tidak ditemukan.', null);
            }

            $data->delete();

            return new GlobalResource(true, 'Data cctv sekolah berhasil dihapus.', null);
        } catch (\Exception $e) {
            return new GlobalResource(false, 'Terjadi kesalahan saat menghapus data cctv sekolah.', null);
        }
    }
}
