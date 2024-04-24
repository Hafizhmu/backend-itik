<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProduksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            DB::table('produksis')->insert([
                'harga_telur' => $faker->randomNumber,
                'berat_total' => $faker->randomNumber,
                'jumlah_telur' => $faker->randomNumber,
                'tanggal_produksi' => $faker->date()
            ]);
        }
    }
}
