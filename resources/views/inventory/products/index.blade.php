@extends('layouts.app', ['page' => 'List of Products', 'pageSlug' => 'products', 'section' => 'inventory'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{__('translation.kazkan')}}</h4>
                        </div>
                        <div class="col-4 text-right">
                            @foreach($products as $p)
                                @if($p->id == 1)
                                    <a href="{{ route('export') }}" class="btn btn-sm btn-success">{{__('translation.Download')}} <i class="tim-icons icon-cloud-download-93"></i></a>
                                @endif
                            @endforeach
                            <a href="{{ route('products.create') }}" class="btn btn-sm btn-primary">{{__('translation.New_Product')}}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')
                    <div class="table-responsive">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col">{{__('translation.Category')}}</th>
                                <th scope="col">{{__('translation.Product')}}</th>
                                <th scope="col">{{__('translation.Base_price')}}</th>
                                <th scope="col">{{__('translation.stock')}}</th>
                                <th scope="col">{{__('translation.inferior_product')}}</th>
                                <th scope="col">{{__('translation.total_sold')}}</th>
                                <th scope="col">{{__('translation.country')}}</th>
                                <th scope="col">{{__('translation.Weight')}}</th>
                                <th scope="col">{{__('translation.Photo')}}</th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td><a href="{{ route('categories.show', $product->category) }}">{{ $product->category->name }}</a></td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ format_money($product->price) }}</td>
                                        <td>{{ $product->stock }}</td>
                                        <td>{{ $product->stock_defective }}</td>
                                        <td>{{ $product->solds->sum('qty') }}</td>
                                        <td>{{ $product->country }}</td>
                                        <td>{{ format_weight($product->weight) }}</td>
                                        <td><img height="64px" width="64px" src="{{ url('public/images/products_images'.$product->image) }}" class="rounded-circle" alt="{{ url('public/images/products_images'.$product->image) }}" title="Product image"></td>
                                        <td class="td-actions text-right">
                                            <a href="{{ route('products.show', $product) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="{{__('translation.More_Details')}}">
                                                <i class="tim-icons icon-zoom-split"></i>
                                            </a>
                                            <a href="{{ route('products.edit', $product) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="{{__('translation.edit_product')}}">
                                                <i class="tim-icons icon-pencil"></i>
                                            </a>
                                            <form action="{{ route('products.destroy', $product) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="{{__('translation.Delete_Product')}}"
                                                        onclick="confirm('{{__('translation.Are_you_sure_you_want_to_remove_this_product?')}}') ? this.parentElement.submit() : ''">
                                                    <i class="tim-icons icon-simple-remove"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
