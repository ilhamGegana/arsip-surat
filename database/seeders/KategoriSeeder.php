<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategoris')->insert([
            ['nama' => 'Undangan', 'judul' => 'Kategori untuk surat undangan', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Pengumuman', 'judul' => 'Kategori untuk surat pengumuman', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Nota Dinas', 'judul' => 'Kategori untuk nota dinas', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Pemberitahuan', 'judul' => 'Kategori untuk surat pemberitahuan', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
