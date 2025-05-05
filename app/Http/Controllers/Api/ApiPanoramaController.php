<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\GlobalResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Panorama;
use Illuminate\Support\Facades\Validator;

class ApiPanoramaController extends Controller
{
    public function index()
    {
        try {
            $panorama = Panorama::all();

            if ($panorama->isEmpty()) {
                return new GlobalResource(false, 'Data Panorama tidak ditemukan', null);
            }

            return new GlobalResource(true, 'List Data CCTV Panorama', $panorama);
        } catch (\Exception $e) {
            return new GlobalResource(false, 'Terjadi kesalahan: ' . $e->getMessage(), null);
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'namaWilayah' => 'required|string|max:255',
                'namaTitik' => 'required|string|max:255',
                'link' => 'required|url',
            ]);

            if ($validator->fails()) {
                return new GlobalResource(false, 'Validasi gagal', $validator->errors());
            }

            $panorama = Panorama::create($request->all());

            return new GlobalResource(true, 'Data Panorama berhasil ditambahkan', $panorama);
        } catch (\Exception $e) {
            return new GlobalResource(false, 'Terjadi kesalahan: ' . $e->getMessage(), null);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $data = Panorama::find($id);

            if (!$data) {
                return new GlobalResource(false, 'Data Panorama tidak ditemukan', null);
            }

            return new GlobalResource(true, 'Detail Data Panorama', $data);
        } catch (\Exception $e) {
            return new GlobalResource(false, 'Terjadi kesalahan: ' . $e->getMessage(), null);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $data = Panorama::find($id);

            if (!$data) {
                return new GlobalResource(false, 'Data Panorama tidak ditemukan', null);
            }

            $validator = Validator::make($request->all(), [
                'namaWilayah' => 'required|string|max:255',
                'namaTitik' => 'required|string|max:255',
                'link' => 'required|url',
            ]);

            if ($validator->fails()) {
                return new GlobalResource(false, 'Validasi gagal', $validator->errors());
            }

            $data->update($request->all());

            return new GlobalResource(true, 'Data Panorama berhasil diupdate', $data);
        } catch (\Exception $e) {
            return new GlobalResource(false, 'Terjadi kesalahan: ' . $e->getMessage(), null);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = Panorama::find($id);

            if (!$data) {
                return new GlobalResource(false, 'Data Panorama tidak ditemukan', null);
            }

            $data->delete();

            return new GlobalResource(true, 'Data Panorama berhasil dihapus', null);
        } catch (\Exception $e) {
            return new GlobalResource(false, 'Terjadi kesalahan: ' . $e->getMessage(), null);
        }
    }
}
