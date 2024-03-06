<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class DetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $data = [
            ['penjualan_id' => 1, 'barang_id' => 1, 'harga' => 10000, 'jumlah' => 1],
            ['penjualan_id' => 2, 'barang_id' => 1, 'harga' => 10000, 'jumlah' => 2],
            ['penjualan_id' => 3, 'barang_id' => 1, 'harga' => 10000, 'jumlah' => 1],
            ['penjualan_id' => 1, 'barang_id' => 2, 'harga' => 15000, 'jumlah' => 1],
            ['penjualan_id' => 2, 'barang_id' => 2, 'harga' => 15000, 'jumlah' => 1],
            ['penjualan_id' => 3, 'barang_id' => 2, 'harga' => 15000, 'jumlah' => 1],
            ['penjualan_id' => 1, 'barang_id' => 3, 'harga' => 7000, 'jumlah' => 1],
            ['penjualan_id' => 2, 'barang_id' => 3, 'harga' => 7000, 'jumlah' => 1],
            ['penjualan_id' => 3, 'barang_id' => 3, 'harga' => 7000, 'jumlah' => 1],
            ['penjualan_id' => 1, 'barang_id' => 4, 'harga' => 5000, 'jumlah' => 2],
            ['penjualan_id' => 2, 'barang_id' => 4, 'harga' => 5000, 'jumlah' => 2],
            ['penjualan_id' => 3, 'barang_id' => 4, 'harga' => 5000, 'jumlah' => 1],
            ['penjualan_id' => 1, 'barang_id' => 5, 'harga' => 3000, 'jumlah' => 1],
            ['penjualan_id' => 2, 'barang_id' => 5, 'harga' => 3000, 'jumlah' => 1],
            ['penjualan_id' => 3, 'barang_id' => 5, 'harga' => 3000, 'jumlah' => 1],
            ['penjualan_id' => 1, 'barang_id' => 6, 'harga' => 3000, 'jumlah' => 1],
            ['penjualan_id' => 2, 'barang_id' => 6, 'harga' => 3000, 'jumlah' => 1],
            ['penjualan_id' => 3, 'barang_id' => 6, 'harga' => 3000, 'jumlah' => 1],
            ['penjualan_id' => 1, 'barang_id' => 7, 'harga' => 35000, 'jumlah' => 1],
            ['penjualan_id' => 2, 'barang_id' => 7, 'harga' => 35000, 'jumlah' => 1],
            ['penjualan_id' => 3, 'barang_id' => 7, 'harga' => 35000, 'jumlah' => 1],
            ['penjualan_id' => 1, 'barang_id' => 8, 'harga' => 55000, 'jumlah' => 1],
            ['penjualan_id' => 2, 'barang_id' => 8, 'harga' => 55000, 'jumlah' => 1],
            ['penjualan_id' => 3, 'barang_id' => 8, 'harga' => 55000, 'jumlah' => 1],
            ['penjualan_id' => 1, 'barang_id' => 9, 'harga' => 55000, 'jumlah' => 1],
            ['penjualan_id' => 2, 'barang_id' => 9, 'harga' => 55000, 'jumlah' => 1],
            ['penjualan_id' => 3, 'barang_id' => 9, 'harga' => 55000, 'jumlah' => 1],
            ['penjualan_id' => 1, 'barang_id' => 10, 'harga' => 55000, 'jumlah' => 1],
            ['penjualan_id' => 2, 'barang_id' => 10, 'harga' => 55000, 'jumlah' => 1],
            ['penjualan_id' => 3, 'barang_id' => 10, 'harga' => 55000, 'jumlah' => 1],
        ];
        DB::table('t_penjualan_detail')->insert($data);
    }
}
