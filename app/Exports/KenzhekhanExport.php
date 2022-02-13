<?php

namespace App\Exports;

use App\Models\Kenzhekhan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithProperties;

class KenzhekhanExport implements WithHeadings, WithMapping, WithProperties, FromCollection
{

    public function collection()
    {
        return Kenzhekhan::all();
    }

    public function headings(): array
    {
        return [
            '№',
            'категория',
            'наименование товара',
            'описание',
            'OEM',
            'цена',
            'количество продуктов шт.',
            'доступность',
            'вес',
            'код товара',
            'использование',
        ];
    }

    public function map($product): array
    {
        if ($product->availability == 1)
            $available = 'доступный';
        elseif ($product->availability == 0)
            $available='недоступно';
        if ($product->product_category_id == 1)
            $product_name = 'Двигатель';
        elseif($product->product_category_id == 2)
            $product_name = 'КПП';
        elseif($product->product_category_id == 3)
            $product_name = 'Электрика';
        elseif($product->product_category_id == 4)
            $product_name = 'Гидронасос и гидрозамки';
        elseif($product->product_category_id == 5)
            $product_name = 'Тормозная система';
        elseif($product->product_category_id == 6)
            $product_name = 'Шасси';
        elseif($product->product_category_id == 7)
            $product_name = 'Запчасти кабины';
        elseif($product->product_category_id == 8)
            $product_name = 'Стрела';
        elseif($product->product_category_id == 9)
            $product_name = 'Ремкомплект';
        elseif($product->product_category_id == 10)
            $product_name = 'Фильтр';
        elseif($product->product_category_id == 11)
            $product_name = 'Разное';

        return [
            $product->id,
            $product->product_category_id => $product_name,
            $product->name,
            $product->description,
            $product->country,
            $product->price.' '.'₸',
            $product->stock,
            $product->availability = $available,
            $product->weight.' '.'КГ',
            $product->product_code,
            $product->usage,
        ];
    }

    public function properties(): array
    {
        return [
            'title'          => 'Кенжехан Товары',
            'description'    => 'Это основные детали продукта',
        ];
    }
}
