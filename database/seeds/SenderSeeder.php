<?php

use App\Model\Sender;
use Illuminate\Database\Seeder;

class SenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sender::create([
            'name' => 'ไปรษณีย์ไทย (Thai Post)',
            'link' => 'https://www.thailandpost.co.th/th/index/'
        ]);


        Sender::create([
            'name' => 'Kerry Express',
            'link' => 'https://th.kerryexpress.com/th/track/'
        ]);
    }
}