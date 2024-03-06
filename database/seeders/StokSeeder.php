<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            ['barang_id' => 1, "user_id" => 3, "stok_tanggal" => date("Y-m-d H:i:s"), "stok_jumlah" => 10],
            ['barang_id' => 2, "user_id" => 3, "stok_tanggal" => date("Y-m-d H:i:s"), "stok_jumlah" => 10],
            ['barang_id' => 3, "user_id" => 3, "stok_tanggal" => date("Y-m-d H:i:s"), "stok_jumlah" => 10],
            ['barang_id' => 4, "user_id" => 3, "stok_tanggal" => date("Y-m-d H:i:s"), "stok_jumlah" => 10],
            ['barang_id' => 5, "user_id" => 3, "stok_tanggal" => date("Y-m-d H:i:s"), "stok_jumlah" => 10],
            ['barang_id' => 6, "user_id" => 3, "stok_tanggal" => date("Y-m-d H:i:s"), "stok_jumlah" => 10],
            ['barang_id' => 7, "user_id" => 3, "stok_tanggal" => date("Y-m-d H:i:s"), "stok_jumlah" => 10],
            ['barang_id' => 8, "user_id" => 3, "stok_tanggal" => date("Y-m-d H:i:s"), "stok_jumlah" => 10],
            ['barang_id' => 9, "user_id" => 1, "stok_tanggal" => date("Y-m-d H:i:s"), "stok_jumlah" => 10],
            ['barang_id' => 10, "user_id" => 1, "stok_tanggal" => date("Y-m-d H:i:s"), "stok_jumlah" => 10],
        ];

        DB::table('t_stok')->insert($data);
    }
}
