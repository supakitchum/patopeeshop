<?php

use App\Model\Order;
use Faker\Factory;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            Order::create([
                'mid' => $faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]),
                'pid' => $faker->numberBetween(1, 20)
            ]);
        }
    }
}