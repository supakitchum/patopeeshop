<?php

use App\Admin;
use Faker\Factory;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        Admin::create([
            'fname' => $faker->firstName,
            'lname' => $faker->lastName,
            'email' => 'admin@test.com',
            'password' => bcrypt('1234')
        ]);
        for ($i = 0; $i < 10; $i++) {
            Admin::create([
                'fname' => $faker->firstName,
                'lname' => $faker->lastName,
                'email' => $faker->email,
                'password' => bcrypt('1234')
            ]);
        }
    }
}
