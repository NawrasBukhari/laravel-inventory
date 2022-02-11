@extends('layouts.app', ['page' => 'Category Information', 'pageSlug' => 'categories', 'section' => 'inventory'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('translation.Category_Information')}}</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>{{__('translation.ID')}}</th>
                            <th>{{__('translation.Name')}}</th>
                            <th>{{__('translation.Products')}}</th>
                            <th>{{__('translation.Stock')}}</th>
                            <th>{{__('translation.Stocks_Faulty')}}</th>
                            <th>{{__('translation.Average_Price')}}</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->products->count() + $category->kenzhekhan->count()}}</td>
                                <td>{{ $category->products->sum('stock') +$category->kenzhekhan->sum('stock') }}</td>
                                <td>{{ $category->products->sum('stock_defective') + $category->kenzhekhan->sum('stock_defective') }}</td>
                                <td>${{ round($category->products->avg('price')) + round($category->kenzhekhan->avg('price')) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('translation.kazkan').':'}} {{ $products->count() }}</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>{{__('translation.ID')}}</th>
                            <th>{{__('translation.Name')}}</th>
                            <th>{{__('translation.Stock')}}</th>
                            <th>{{__('translation.Defective_Stock')}}</th>
                            <th>{{__('translation.Base_price')}}</th>
                            <th>{{__('translation.Average_Price')}}</th>
                            <th>{{__('translation.Total_sales')}}</th>
                            <th>{{__('translation.Income_Produced')}}</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td><a href="{{ route('products.show', $product) }}">{{ $product->id }}</a></td>
                                    <td><a href="{{ route('products.show', $product) }}">{{ $product->name }}</a></td>
                                    <td>{{ $product->stock }}</td>
                                    <td>{{ $product->stock_defective }}</td>
                                    <td>{{ format_money($product->price) }}</td>
                                    <td>{{ format_money($product->solds->avg('price')) }}</td>
                                    <td>{{ $product->solds->sum('qty') }}</td>
                                    <td>{{ format_money($product->solds->sum('total_amount')) }}</td>
                                    <td class="td-actions text-right">
                                        <a href="{{ route('products.show', $product) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="More Details">
                                            <i class="tim-icons icon-zoom-split"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end">
                        {{ $products->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
    {{-- Here Goes Kenzhekhan --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('translation.kenzhekhan')}} {{ $kenzhelhan->count() }}</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <th>{{__('translation.ID')}}</th>
                        <th>{{__('translation.Name')}}</th>
                        <th>{{__('translation.Stock')}}</th>
                        <th>{{__('translation.Defective_Stock')}}</th>
                        <th>{{__('translation.Base_price')}}</th>
                        <th>{{__('translation.Average_Price')}}</th>
                        <th>{{__('translation.Total_sales')}}</th>
                        <th>{{__('translation.Income_Produced')}}</th>
                        <th></th>
                        </thead>
                        <tbody>
                        @foreach ($kenzhelhan as $product)
                            <tr>
                                <td><a href="{{ route('products.show', $product) }}">{{ $product->id }}</a></td>
                                <td><a href="{{ route('products.show', $product) }}">{{ $product->name }}</a></td>
                                <td>{{ $product->stock }}</td>
                                <td>{{ $product->stock_defective }}</td>
                                <td>{{ format_money($product->price) }}</td>
                                <td>{{ format_money($product->solds->avg('price')) }}</td>
                                <td>{{ $product->solds->sum('qty') }}</td>
                                <td>{{ format_money($product->solds->sum('total_amount')) }}</td>
                                <td class="td-actions text-right">
                                    <a href="{{ route('kenzhekhan.show', $product) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="More Details">
                                        <i class="tim-icons icon-zoom-split"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end">
                        {{ $products->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection