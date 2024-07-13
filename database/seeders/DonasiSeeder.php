<?php

namespace Database\Seeders;

use App\Models\Donasi;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DonasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            Donasi::create([
                'nama' => $faker->name,
                'email' => $faker->email,
                'jumlah' => $faker->randomFloat(2, 10, 1000),
                'pesan' => $faker->sentence,
            ]);
        }
    }
}
