<?php

use App\Model\Report;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
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
            Report::create([
                'email' => $faker->email,
                'name' => $faker->name,
                'order_id'  => $faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]),
                'detail' =>  sentence($nbWords = 9, $variableNbWords = true),
                'phone' =>  $faker->tollFreePhoneNumber,
            ]);
        }
    }
}