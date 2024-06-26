<?php

use App\Model\Color;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Color::create([
            'name' => 'แดง',
            'code' => '#A93226'
        ]);
        Color::create([
            'name' => 'ดำ',
            'code' => '#000000'
        ]);
        Color::create([
            'name' => 'ขาว',
            'code' => '#FFFFFF'
        ]);
        Color::create([
            'name' => 'เทา',
            'code' => '#808B96'
        ]);
        Color::create([
            'name' => 'เหลือง',
            'code' => '#F4D03F'
        ]);
        Color::create([
            'name' => 'เขียว',
            'code' => '#2ECC71'
        ]);
    }
}
