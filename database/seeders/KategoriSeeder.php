<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            ['kategori_kode' => 'KTG01', 'kategori_nama' => 'Alat Mandi'],
            ['kategori_kode' => 'KTG02', 'kategori_nama' => 'Minuman'],
            ['kategori_kode' => 'KTG03', 'kategori_nama' => 'Makanan'],
            ['kategori_kode' => 'KTG04', 'kategori_nama' => 'Pakaian'],
            ['kategori_kode' => 'KTG05', 'kategori_nama' => 'Sepatu'],
        ];

        DB::table('m_kategori')->insert($data);
    }
}
