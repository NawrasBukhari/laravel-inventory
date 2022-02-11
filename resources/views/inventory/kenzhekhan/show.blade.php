@extends('layouts.app', ['page' => 'Product Information', 'pageSlug' => 'kenzhekhan', 'section' => 'inventory'])

@section('content')
    <style>
    </style>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('translation.Product_Information')}}</h4>
                </div>
                <div class="card-body">

                    <table class="table table-responsive-sm">
                        <thead>
                        <th>{{__('translation.Category')}}</th>
                        <th>{{__('translation.Name')}}</th>
                        <th>{{__('translation.Photo')}}</th>
                        <th>{{__('translation.country')}}</th>
                        <th>{{__('translation.stock')}}</th>
                        <th>{{__('translation.product_code')}}</th>
                        <th>{{__('translation.Weight')}}</th>
                        <th>{{__('translation.Defective_Stock')}}</th>
                        <th>{{__('translation.Base_price')}}</th>
                        <th>{{__('translation.Average_Price')}}</th>
                        <th>{{__('translation.Total_sales')}}</th>
                        <th>{{__('translation.Income_Produced')}}</th>
                        </thead>
                        <tbody>
                        <tr>
                            <td><a href="{{ route('categories.show', $kenzhekhan->category) }}">{{ $kenzhekhan->category->name }}</a></td>
                            <td>{{ $kenzhekhan->name }}</td>
                            <td>
                                <img
                                        height="50px" width="50px"
                                        src="{{ url('public/images/products_images'.$kenzhekhan->image) }}"
                                        class="zoom"
                                        alt="{{ asset('storage/images'.$kenzhekhan->image) }}"
                                        title="Product image">
                            </td>
                            <td>{{ $kenzhekhan->country }}</td>
                            <td>{{ $kenzhekhan->stock }}</td>
                            <td>{{ $kenzhekhan->product_code }}</td>
                            <td>{{ $kenzhekhan->weight }}</td>
                            <td>{{ $kenzhekhan->stock_defective }}</td>
                            <td>{{ format_money($kenzhekhan->price) }}</td>
                            <td>{{ format_money($kenzhekhan->solds->avg('price')) }}</td>
                            <td>{{ $kenzhekhan->solds->sum('qty') }}</td>
                            <td>{{ format_money($kenzhekhan->solds->sum('total_amount')) }}</td>

                        </tr>
                        </tbody>
                    </table><!--Here ends-->
                </div>
            </div>
        </div>
    </div><!--ends-->

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{__('translation.latest_sales')}}</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <th>{{__('translation.Date')}}</th>
                        <th>{{__('translation.sale_id')}}</th>
                        <th>{{__('translation.Quantity')}}</th>
                        <th>{{__('translation.price_unit')}}</th>
                        <th>{{__('translation.Total_Amount')}}</th>
                        <th></th>
                        </thead>
                        <tbody>
                        @foreach ($solds as $sold)
                            <tr>
                                <td>{{ date('d-m-y', strtotime($sold->created_at)) }}</td>
                                <td><a href="{{ route('sales.show', $sold->sale_id) }}">{{ $sold->sale_id }}</a></td>
                                <td>{{ $sold->qty }}</td>
                                <td>{{ format_money($sold->price) }}</td>
                                <td>{{ format_money($sold->total_amount) }}</td>
                                <td class="td-actions text-right">
                                    <a href="{{ route('sales.show', $sold->sale_id) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="View Sale">
                                        <i class="tim-icons icon-zoom-split"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{__('translation.Latest_Receipts')}}</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <th>{{__('translation.Date')}}</th>
                        <th>{{__('translation.Latest_Receipts')}}</th>
                        <th>{{__('translation.Title')}}</th>
                        <th>{{__('translation.stock')}}</th>
                        <th>{{__('translation.Defective_Stock')}}</th>
                        <th>{{__('translation.Total_Stock')}}</th>
                        <th></th>
                        </thead>
                        <tbody>
                        @foreach ($receiveds as $received)
                            <tr>
                                <td>{{ date('d-m-y', strtotime($received->created_at)) }}</td>
                                <td><a href="{{ route('receipts.show', $received->receipt) }}">{{ $received->receipt_id }}</a></td>
                                <td style="max-width:150px;">{{ $received->receipt->title }}</td>
                                <td>{{ $received->stock }}</td>
                                <td>{{ $received->stock_defective }}</td>
                                <td>{{ $received->stock + $received->stock_defective }}</td>
                                <td class="td-actions text-right">
                                    <a href="{{ route('receipts.show', $received->receipt) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Ver Receipt">
                                        <i class="tim-icons icon-zoom-split"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
