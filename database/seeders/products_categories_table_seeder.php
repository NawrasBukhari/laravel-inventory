<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class products_categories_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_categories')->insert([
            ['name' => 'Двигатель', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['name' => 'КПП', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['name' => 'Электрика', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['name' => 'Гидронасос и гидрозамки', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['name' => 'Тормозная система', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['name' => 'Шасси', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['name' => 'Запчасти кабины', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['name' => 'Стрела', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['name' => 'Ремкомплект', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['name' => 'Фильтр', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['name' => 'Разное', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
        ]);
    }
}
