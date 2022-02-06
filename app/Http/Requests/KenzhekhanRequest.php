<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class KenzhekhanRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }
    public function rules()
    {
        return [
            'name' => ['required'],
            'product_category_id' => ['required'],
            'description' => [],
            'stock' => ['required'],
            'price' => ['required'],
            'price_wholesaler' => [],
        ];
    }
    public function attributes()
    {
        return [
        ];
    }
}
