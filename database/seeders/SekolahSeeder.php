<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sekolah')->insert([
            [
                'namaWilayah' => 'KOTA JOGJA',
                'namaSekolah' => 'SMAN 6 YK',
                'namaTitik'   => 'LORONG 204',
                'link'        => 'http://103.255.15.227:5080/CCTVSEKOLAH/play.html?id=cctv_sma6yk_lorong204',
                'created_at'  => Carbon::create('2025', '02', '14', '02', '03', '11'),
                'updated_at'  => Carbon::create('2025', '02', '22', '03', '36', '03'),
            ],
            [
                'namaWilayah' => 'KOTA JOGJA',
                'namaSekolah' => 'SMAN 6 YK',
                'namaTitik'   => 'DALAM MASJID',
                'link'        => 'http://103.255.15.227:5080/CCTVSEKOLAH/play.html?id=cctv_sma1cangkringan_lapupacara',
                'created_at'  => Carbon::create('2025', '02', '14', '02', '03', '40'),
                'updated_at'  => Carbon::create('2025', '04', '30', '08', '13', '18'),
            ],
            [
                'namaWilayah' => 'KOTA JOGJA',
                'namaSekolah' => 'SMAN 6 YK',
                'namaTitik'   => 'DEPAN WAKA',
                'link'        => 'http://103.255.15.227:5080/CCTVSEKOLAH/play.html?id=cctv_sma6yk_depanmasjid',
                'created_at'  => Carbon::create('2025', '02', '14', '02', '05', '59'),
                'updated_at'  => Carbon::create('2025', '02', '22', '03', '36', '16'),
            ],
            [
                'namaWilayah' => 'KOTA JOGJA',
                'namaSekolah' => 'SMAN 6 YK',
                'namaTitik'   => 'KELAS 110',
                'link'        => 'http://103.255.15.227:5080/CCTVSEKOLAH/play.html?id=cctv_sma6yk_kelas110',
                'created_at'  => Carbon::create('2025', '02', '14', '02', '07', '08'),
                'updated_at'  => Carbon::create('2025', '02', '22', '03', '36', '22'),
            ],
            [
                'namaWilayah' => 'KOTA JOGJA',
                'namaSekolah' => 'SMAN 6 YK',
                'namaTitik'   => 'LORONG 1',
                'link'        => 'http://103.255.15.227:5080/CCTVSEKOLAH/play.html?id=cctv_sma6yk_lorong1',
                'created_at'  => Carbon::create('2025', '02', '14', '02', '07', '31'),
                'updated_at'  => Carbon::create('2025', '02', '22', '03', '36', '29'),
            ],
            [
                'namaWilayah' => 'KOTA JOGJA',
                'namaSekolah' => 'SMKN 1 YK',
                'namaTitik'   => 'AULA',
                'link'        => 'http://103.255.15.227:5080/CCTVSEKOLAH/play.html?id=cctv_smk1yk_aula',
                'created_at'  => Carbon::create('2025', '02', '14', '02', '09', '27'),
                'updated_at'  => Carbon::create('2025', '02', '14', '02', '11', '43'),
            ],
            [
                'namaWilayah' => 'KOTA JOGJA',
                'namaSekolah' => 'SMKN 1 YK',
                'namaTitik'   => 'AULA',
                'link'        => 'http://103.255.15.227:5080/CCTVSEKOLAH/play.html?id=cctv_smk1yk_aula',
                'created_at'  => Carbon::create('2025', '02', '14', '02', '09', '27'),
                'updated_at'  => Carbon::create('2025', '02', '14', '02', '11', '43'),
            ],
        ]);
    }
}
