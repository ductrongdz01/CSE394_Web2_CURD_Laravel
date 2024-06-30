<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Oder;
use Faker\Factory as Faker;
use App\Models\Product;
use App\Models\OderDetail;

class OderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $productID = Product::pluck('ProductID');
        $OrderID = Oder::pluck('OrderID');
        for ($i = 0; $i < 10; $i++) {
            OderDetail::create([
                'ProductID' => $productID->random(),
                'OrderID' => $OrderID->random(),
                'Amount' => $faker->numberBetween(2, 100),
                'Note' => $faker->sentence(6, true)
            ]);
        }
    }
}
