<?php

use App\Model\Payment;
use Faker\Factory;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
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
            Payment::create([
                'amount' => $faker->randomNumber(3),
                'slip' => $faker->randomNumber(3),
                'transfer_at'  => $faker->dateTime,
                'bank' =>  'ธนาคารไทยพาณิชย์ เลขที่บัญชี 586-5654-5642',
                'order_id' =>  $faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]),
            ]);
        }
    }
}