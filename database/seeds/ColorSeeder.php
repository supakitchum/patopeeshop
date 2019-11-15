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
            'name' => 'แดง'
        ]);
        Color::create([
            'name' => 'ดำ'
        ]);
        Color::create([
            'name' => 'ขาว'
        ]);
        Color::create([
            'name' => 'เทา'
        ]);
        Color::create([
            'name' => 'เหลือง'
        ]);
        Color::create([
            'name' => 'เขียว'
        ]);
    }
}