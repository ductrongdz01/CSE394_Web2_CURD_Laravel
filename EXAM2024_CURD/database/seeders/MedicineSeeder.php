<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Medicines;
use Faker\Factory as Faker;


class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            Medicines::create([
                'Name' => $faker->word(),
                'Brand' => $faker->word(),
                'Dosage' => $faker->word(),
                'Form' => $faker->word(),
                'Price' => $faker->randomFloat(2, 10, 100),
                'Stock' => $faker->numberBetween(2, 100),
            ]);
        }
    }
}
