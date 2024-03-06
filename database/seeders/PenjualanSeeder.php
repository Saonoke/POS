<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            ["user_id" => 3, "pembeli" => 'Krisna', "penjualan_kode" => 'PNJL001', "penjualan_tanggal" => date("Y-m-d H:i:s")],
            ["user_id" => 3, "pembeli" => 'Andika', "penjualan_kode" => 'PNJL002', "penjualan_tanggal" => date("Y-m-d H:i:s")],
            ["user_id" => 3, "pembeli" => 'Wijaya', "penjualan_kode" => 'PNJL003', "penjualan_tanggal" => date("Y-m-d H:i:s")],
            ["user_id" => 3, "pembeli" => 'Febrio', "penjualan_kode" => 'PNJL004', "penjualan_tanggal" => date("Y-m-d H:i:s")],
            ["user_id" => 3, "pembeli" => 'Ridlo', "penjualan_kode" => 'PNJL005', "penjualan_tanggal" => date("Y-m-d H:i:s")],
            ["user_id" => 3, "pembeli" => 'Raffy', "penjualan_kode" => 'PNJL006', "penjualan_tanggal" => date("Y-m-d H:i:s")],
            ["user_id" => 3, "pembeli" => 'Jamil', "penjualan_kode" => 'PNJL007', "penjualan_tanggal" => date("Y-m-d H:i:s")],
            ["user_id" => 3, "pembeli" => 'Octovialdi', "penjualan_kode" => 'PNJL008', "penjualan_tanggal" => date("Y-m-d H:i:s")],
            ["user_id" => 3, "pembeli" => 'Denny', "penjualan_kode" => 'PNJL009', "penjualan_tanggal" => date("Y-m-d H:i:s")],
            ["user_id" => 3, "pembeli" => 'Malik', "penjualan_kode" => 'PNJL010', "penjualan_tanggal" => date("Y-m-d H:i:s")],
        ];
        DB::table('t_penjualan')->insert($data);
    }
}
