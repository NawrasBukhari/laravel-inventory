<?php

namespace App\Http\Controllers;
use App\Country;
use App\Product;
use App\ProductCategory;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(25);

        return view('inventory.products.index', compact('products',$products));
    }

    public function create()
    {
        $categories = ProductCategory::all();
        $countries = Country::all();
        return view('inventory.products.create', compact('categories', 'countries'));
    }

    public function store(ProductRequest $request, Product $model)
    {
        $uploadFile = $request->file('image');
        $filename = Str::random(8).'.'.$uploadFile->extension();
        $path = '';
        $uploadFile->storeAs($path, $filename,'uploads');
        $model = new Product();
        $model->name = $request->name;
        $model->description = $request->description;
        $model->product_category_id = $request->product_category_id;
        $model->price = $request->price;
        $model->stock = $request->stock;
        $model->stock_defective = $request->stock_defective;
        $model->country = $request->country;
        $model->availability = $request->availability;
        $model->product_code=$request->product_code;
        $model->usage=$request->usage;
        $model->weight=$request->weight;
        $model->image = $path.'/'.$filename;
        $model->save([$model]);
            return redirect()
                ->route('products.index')
                ->withStatus('Product successfully registered.');
    }

    public function show(Product $product)
    {
        $solds = $product->solds()->latest()->limit(25)->get();

        $receiveds = $product->receiveds()->latest()->limit(25)->get();

        return view('inventory.products.show', compact('product', 'solds', 'receiveds'));
    }


    public function edit(Product $product)
    {
        $categories = ProductCategory::all();
        $countries = Country::all();
        return view('inventory.products.edit', compact('product', 'categories', 'countries'));
    }


    public function update(ProductRequest $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'product_category_id' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'stock_defective' => 'required',
            'image' => 'required',
            'country'=>'required',
            'availability'=>'required',
            'weight'=>'required',
            'product_code'=>'required',
            'usage'=>'required',
        ]);
        $uploadFile = $request->file('image');
        $filename = Str::random(8).'.'.$uploadFile->extension();
        $path = '';
        $uploadFile->storeAs($path, $filename,'uploads');
        $product->update($request->all());
        $product->image = $path.'/'.$filename;
        $product->save([$product]);

        return redirect()
            ->route('products.index')
            ->withStatus('Product updated successfully.');

    }

    // ------------------------------------------------------------------------------------------------- //
    public function country()
    {
        $countries = Country::all();
        return view('inventory.products.create', compact('countries', $countries));
    }


    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->route('products.index')
            ->withStatus('Product removed successfully.');
    }

}
