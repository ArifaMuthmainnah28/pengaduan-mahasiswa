<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pengaduan;

class PengaduanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pengaduan::create([
            'judul' => 'Wifi rusak di Gedung A',
            'isi' => 'Sudah 3 hari wifi di lantai 2 tidak bisa digunakan.',
            'status' => 'Menunggu',
        ]);

        Pengaduan::create([
            'judul' => 'AC di ruang B103 mati',
            'isi' => 'Mohon perbaikan AC karena ruang sangat panas.',
            'status' => 'Diproses',
        ]);

        Pengaduan::create([
            'judul' => 'Parkiran penuh terus',
            'isi' => 'Setiap pagi tidak ada lahan parkir untuk motor mahasiswa.',
            'status' => 'Selesai',
        ]);
    }
}
