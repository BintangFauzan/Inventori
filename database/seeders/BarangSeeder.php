<?php

namespace Database\Seeders;

use App\Models\barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) { // Menghasilkan 50 data
            barang::create([
                'nama_barang' => $faker->word,
                'jenis_barang' => $faker->randomElement(['rokok', 'sabun', 'makanan']),
                'stok' => $faker->numberBetween(1, 100),
                'harga' => $faker->numberBetween(1000, 100000),
            ]);
        }
    }
}
