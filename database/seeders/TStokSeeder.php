<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\MBarang; // Pastikan model MBarang sudah ada

class TStokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $barangIds = MBarang::pluck('id')->toArray();

        for ($i = 0; $i < 10; $i++) {
            DB::table('t_stok')->insert([
                'barang_id' => $barangIds[$i], // Asumsi 1 stok untuk setiap barang
                'jumlah_masuk' => $faker->numberBetween(10, 50),
                'jumlah_keluar' => $faker->numberBetween(0, 5),
                'tanggal' => $faker->dateTimeBetween('-1 month', 'now'),
                'keterangan' => $faker->sentence(2),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}