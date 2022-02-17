<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(products_categories_table_seeder::class);
        $this->call(payment_mothods_table_seeder::class);
        $this->call(\Database\Seeders\countries_table_seeder::class);
    }
}
