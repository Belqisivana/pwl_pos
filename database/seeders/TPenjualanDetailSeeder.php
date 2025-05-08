<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Tpenjualan; // Pastikan model TPenjualan sudah ada
use App\Models\MBarang;     // Pastikan model MBarang sudah ada

class TPenjualanDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $penjualanIds = TPenjualan::pluck('id')->toArray();
        $barangIds = MBarang::pluck('id')->toArray();

        foreach ($penjualanIds as $penjualanId) {
            $totalHargaTransaksi = 0;
            for ($i = 0; $i < 3; $i++) {
                $barang = MBarang::find($faker->randomElement($barangIds));
                $jumlah = $faker->numberBetween(1, 5);
                $subtotal = $barang->harga_jual * $jumlah;

                DB::table('t_penjualan_detail')->insert([
                    'penjualan_id' => $penjualanId,
                    'barang_id' => $barang->id,
                    'jumlah' => $jumlah,
                    'harga_satuan' => $barang->harga_jual,
                    'subtotal' => $subtotal,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                $totalHargaTransaksi += $subtotal;
            }
            // Update total harga di tabel t_penjualan
            DB::table('t_penjualan')
                ->where('id', $penjualanId)
                ->update(['total_harga' => $totalHargaTransaksi]);
        }
    }
}
