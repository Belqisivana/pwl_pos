<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $kategori = ['Makanan', 'Minuman', 'Pakaian', 'Elektronik', 'Lain-lain'];

        for ($i = 0; $i < 5; $i++) {
            DB::table('m_kategori')->insert([
                'nama_kategori' => $kategori[$i],
                'deskripsi' => $faker->sentence(3),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}