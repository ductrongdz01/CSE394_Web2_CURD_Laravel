<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            Product::create([
                'ProductName' => $faker->word(),
                'PriceQuotation' => $faker->randomFloat(2, 10000, 100000),
                'ReceivingDate' => $faker->dateTimeBetween('-1 year', '-1 month')->format('Y-m-d'),
            ]);
        }
    }
}
