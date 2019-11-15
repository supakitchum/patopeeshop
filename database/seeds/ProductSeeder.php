<?php

use App\Model\Product;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 20; $i++) {
            Product::create([
                'name' => $faker->name,
                'price' => $faker->randomNumber(3),
                'cid'  => $faker->randomElement([1, 2, 3, 4, 5]),
                'color' =>  $faker->randomElement([1, 2, 3, 4, 5]),
                'size' =>  $faker->randomElement([1, 2, 3, 4, 5, 6]),
                'quality' => $faker->$faker->randomNumber(3),
            ]);
        }
    }
}