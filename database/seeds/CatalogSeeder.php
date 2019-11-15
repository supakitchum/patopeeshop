<?php

use App\Model\Catalog;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Catalog::create([
            'name' => 'เสื้อโปโล'
        ]);
        Catalog::create([
            'name' => 'เสื้อยืด'
        ]);
        Catalog::create([
            'name' => 'เสื้อแขนยาว'
        ]);
        Catalog::create([
            'name' => 'เสื้อเชิ้ต'
        ]);
        Catalog::create([
            'name' => 'เสื้อแจ็คเก็ต'
        ]);
    }
}