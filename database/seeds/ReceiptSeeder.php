<?php

use App\Model\Receipt;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ReceiptSeeder extends Seeder
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
            Receipt::create([
                'order_id' => $faker->randomElement([1, 2, 3, 4, 5]),
                'tracking_number' => $faker->numerify('PTP #############'),
                'amount'  => $faker->randomNumber(3),
                'comment' =>  $faker->sentence($nbWords = 9, $variableNbWords = true),
                'uid' =>  $faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]),
                'sender_id' => $faker->randomElement([1, 2]),
                'sending' => $faker->randomElement([0, 1]),
                'address' => $faker->address,
                'send_at' => $faker->dateTime,
                'platform' => $faker->randomElement(['website', 'facebook'])
            ]);
        }
    }
}
