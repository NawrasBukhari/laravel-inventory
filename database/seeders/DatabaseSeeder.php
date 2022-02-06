<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(products_categories_table_seeder::class);
        $this->call(payment_mothods_table_seeder::class);
        $this->call(WorldSeeder::class);
    }
}
