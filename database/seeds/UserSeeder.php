<?php

use App\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt('1234'),
                'province' => $faker->citySuffix,
                'district' => $faker->citySuffix,
                'zip_code' => $faker->postcode,
                'address' => $faker->secondaryAddress,
                'phone' => $faker->tollFreePhoneNumber,
                'email_verified_at' => $faker->dateTime
            ]);
        }
    }
}
