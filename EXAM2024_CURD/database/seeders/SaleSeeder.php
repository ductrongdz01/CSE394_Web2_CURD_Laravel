<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sales;
use App\Models\Medicines;
use Faker\Factory as Faker;


class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $MedicineID = Medicines::pluck('MedicineID');

        for ($i = 0; $i < 10; $i++) {
            Sales::create([
                'MedicineID' => $MedicineID->random(),
                'Quantity' => $faker->numberBetween(2, 100),
                'SaleDate' => $faker->dateTimeBetween('-1 month', '-3 day'),
                // 'CustomerPhone' =>$faker->phoneNumber(),
                'CustomerPhone' => $faker->numerify('09########'),
            ]);
        }
    }
}
