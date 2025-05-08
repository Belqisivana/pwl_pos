<?php

namespace Database\Seeders;
namespace App\Models;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\MKategori; // Pastikan model MKategori sudah ada

class MBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $kategoriIds = MKategori::pluck('id')->toArray();

        for ($i = 0; $i < 10; $i++) {
            DB::table('m_barang')->insert([
                'kategori_id' => $faker->randomElement($kategoriIds),
                'nama_barang' => $faker->unique()->word() . ' ' . $faker->randomDigit(),
                'harga_beli' => $faker->numberBetween(1000, 10000),
                'harga_jual' => $faker->numberBetween(1200, 15000),
                'deskripsi' => $faker->paragraph(1),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}