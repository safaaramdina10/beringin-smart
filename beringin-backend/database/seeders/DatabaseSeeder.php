<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Laporan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database for Beringin Smart (Safa Ramdina Edition).
     */
    public function run(): void
    {
        // 1. Akun Petugas Sarpras
        $petugas = User::updateOrCreate(
            ['email' => 'petugas@beringin.sch.id'],
            [
                'name'     => 'Pak Hendra (Petugas Sarpras)',
                'password' => Hash::make('password123'),
                'role'     => 'petugas',
            ]
        );

        // 2. Akun Siswa (Safa Ramdina)
        $siswa = User::updateOrCreate(
            ['email' => 'safa@beringin.sch.id'],
            [
                'name'     => 'Safa Ramdina (XI PPLG 3)',
                'password' => Hash::make('password123'),
                'role'     => 'siswa',
            ]
        );

        // Siswa Pendukung (Opsional untuk testing multi-siswa)
        $siswaPendukung = User::updateOrCreate(
            ['email' => 'siswa@beringin.sch.id'],
            [
                'name'     => 'Nadia Putri (XI PPLG 2)',
                'password' => Hash::make('password123'),
                'role'     => 'siswa',
            ]
        );

        // 3. Data Awal Laporan Pengaduan Sarpras
        Laporan::updateOrCreate(
            ['lokasi' => 'Ruang Praktik Rekayasa Perangkat Lunak'],
            [
                'user_id'   => $siswa->id,
                'nama'      => $siswa->name,
                'kategori'  => 'Laboratorium',
                'deskripsi' => 'Mouse optik komputer nomor 12 tidak merespons dan kabel HDMI proyektor utama longgar.',
                'status'    => 'Menunggu',
            ]
        );

        Laporan::updateOrCreate(
            ['lokasi' => 'Perpustakaan & Ruang Baca'],
            [
                'user_id'   => $siswa->id,
                'nama'      => $siswa->name,
                'kategori'  => 'Fasilitas Kelas',
                'deskripsi' => 'Unit AC di dekat rak buku referensi meneteskan air ke lantai dan lampu plafon berkedip.',
                'status'    => 'Sedang Diproses',
            ]
        );

        Laporan::updateOrCreate(
            ['lokasi' => 'Lapangan Olahraga & Upacara'],
            [
                'user_id'   => $siswaPendukung->id,
                'nama'      => $siswaPendukung->name,
                'kategori'  => 'Lingkungan/Taman',
                'deskripsi' => 'Baut pengikat papan pantul ring basket utara longgar dan kran wastafel samping lapangan macet.',
                'status'    => 'Selesai',
            ]
        );
    }
}
