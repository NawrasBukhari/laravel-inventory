<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class payment_mothods_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_methods')->insert([
            ['name' => 'КАСПИ GOLD', 'description'=>'Использование каспи перевод','created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['name' => 'наличные деньги','description'=>'Оплата из рук в руки' ,'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
        ]);
    }
}
