<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Oder;
use Faker\Factory as Faker;

class OderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            Oder::create([
                'SaleDate' => $faker->dateTimeBetween('-1 month', '-3 day'),
                'EmployeeID' => $faker->numerify('1#########'),
            ]);
        }
    }
}
