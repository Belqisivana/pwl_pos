<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TPenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 10; $i++) {
            DB::table('t_penjualan')->insert([
                'kode_transaksi' => 'TRX-' . date('YmdHis') . '-' . $i,
                'tanggal_transaksi' => $faker->dateTimeBetween('-2 weeks', 'now'),
                'total_harga' => 0, // Akan diupdate setelah detail penjualan dibuat
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}