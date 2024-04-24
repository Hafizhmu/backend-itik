<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PeritikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            DB::table('peritikans')->insert([
                'jumlah_penambahan' => $faker->randomNumber,
                'jumlah_sakit' => $faker->randomNumber,
                'jumlah_kematian' => $faker->randomNumber,
                'jumlah_total' => $faker->randomNumber,
                'tanggal' => $faker->date()
            ]);
        }
    }
}
