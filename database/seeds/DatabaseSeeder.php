<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(CatalogSeeder::class);
        $this->call(ColorSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(PaymentSeeder::class);
//        $this->call(ProductSeeder::class);
        $this->call(ReceiptSeeder::class);
        $this->call(ReportSeeder::class);
        $this->call(SenderSeeder::class);
        $this->call(SizeSeeder::class);
        $this->call(UserSeeder::class);
    }
}
