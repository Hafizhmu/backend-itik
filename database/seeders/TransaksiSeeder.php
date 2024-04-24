<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            DB::table('transaksis')->insert([
                'nama_pembeli' => $faker->name(),
                'alamat_pembeli' => $faker->address(),
                'jumlah_telur' => $faker->randomNumber,
                'harga_jual' => $faker->randomNumber,
                'tanggal_transaksi' => $faker->date()
            ]);
        }
    }
}
