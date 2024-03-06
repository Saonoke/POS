<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            ['kategori_id' => '1', 'barang_kode' => 'SBN', 'barang_nama' => 'Sabun', 'harga_beli' => 6000, 'harga_jual' => 10000],
            ['kategori_id' => '1', 'barang_kode' => 'SMP', 'barang_nama' => 'Sampo', 'harga_beli' => 10000, 'harga_jual' => 15000],
            ['kategori_id' => '2', 'barang_kode' => 'SDD', 'barang_nama' => 'Soda', 'harga_beli' => 5000, 'harga_jual' => 7000],
            ['kategori_id' => '2', 'barang_kode' => 'TEH', 'barang_nama' => 'Teh', 'harga_beli' => 4000, 'harga_jual' => 5000],
            ['kategori_id' => '3', 'barang_kode' => 'NSI', 'barang_nama' => 'Nasi', 'harga_beli' => 3000, 'harga_jual' => 3000],
            ['kategori_id' => '3', 'barang_kode' => 'MIE', 'barang_nama' => 'Mie', 'harga_beli' => 2500, 'harga_jual' => 3000],
            ['kategori_id' => '4', 'barang_kode' => 'BJU', 'barang_nama' => 'Baju', 'harga_beli' => 30000, 'harga_jual' => 35000],
            ['kategori_id' => '4', 'barang_kode' => 'CLN', 'barang_nama' => 'Celana', 'harga_beli' => 50000, 'harga_jual' => 55000],
            ['kategori_id' => '5', 'barang_kode' => 'BOT', 'barang_nama' => 'Boot', 'harga_beli' => 50000, 'harga_jual' => 55000],
            ['kategori_id' => '5', 'barang_kode' => 'FLT', 'barang_nama' => 'Flat', 'harga_beli' => 50000, 'harga_jual' => 55000],
        ];
        DB::table('m_barang')->insert($data);
    }
}
