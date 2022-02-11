@extends('layouts.app', ['page' => 'Manage Sale', 'pageSlug' => 'sales', 'section' => 'transactions'])

@section('content')
    @include('alerts.success')
    @include('alerts.error')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{__('translation.Sale_Summary')}}</h4>
                        </div>
                        @if (!$sale->finalized_at)
                            <div class="col-4 text-right">
                                @if ($sale->products->count() == 0)
                                    <form action="{{ route('sales.destroy', $sale) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-primary">
                                            {{__('translation.Delete_Sale')}}
                                        </button>
                                    </form>
                                @else
                                    <button type="button" class="btn btn-sm btn-primary" onclick="confirm('ВНИМАНИЕ: Сделки этой продажи похоже не совпадают со стоимостью продукции, хотите доработать? Ваши записи не могут быть изменены с этого момента?') ? window.location.replace('{{ route('sales.finalize', $sale) }}') : ''">
                                        {{__('translation.Finalize_Sale')}}
                                    </button>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>{{__('translation.ID')}}</th>
                            <th>{{__('translation.Date')}}</th>
                            <th>{{__('translation.User')}}</th>
                            <th>{{__('translation.Clients')}}</th>
                            <th>{{__('translation.Products')}}</th>
                            <th>{{__('translation.Total_Stock')}}</th>
                            <th>{{__('translation.total_sold')}}</th>
                            <th>{{__('translation.Status')}}</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $sale->id }}</td>
                                <td>{{ date('d-m-y', strtotime($sale->created_at)) }}</td>
                                <td>{{ $sale->user->name }}</td>
                                <td><a href="{{ route('clients.show', $sale->client) }}">{{ $sale->client->name }}<br>{{ $sale->client->document_type }}-{{ $sale->client->document_id }}</a></td>
                                <td>{{ $sale->products->count() }}</td>
                                <td>{{ $sale->products->sum('qty') }}</td>
                                <td>{{ format_money($sale->products->sum('total_amount')) }}</td>
                                <td>{!! $sale->finalized_at ? 'Completed at<br>'.date('d-m-y', strtotime($sale->finalized_at)) : (($sale->products->count() > 0) ? 'TO FINALIZE' : 'ON HOLD') !!}</td>
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
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{__('translation.Products')}}: {{ $sale->products->sum('qty') }}</h4>
                        </div>
                        @if (!$sale->finalized_at)
                            <div class="col-4 text-right">
                                <a href="{{ route('sales.product.add', ['sale' => $sale->id]) }}" class="btn btn-sm btn-primary">{{__('translation.Add')}}</a>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>{{__('translation.ID')}}</th>
                            <th>{{__('translation.Category')}}</th>
                            <th>{{__('translation.Product')}}</th>
                            <th>{{__('translation.Quantity')}}</th>
                            <th>{{__('translation.Price')}}</th>
                            <th>{{__('translation.Total')}}</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach ($sale->products as $sold_product)
                                <tr>
                                    <td>{{ $sold_product->product->id or $sold_kenzhekhan->kenzhekhan->id}}</td>
                                    <td><a href="{{ route('categories.show', $sold_product->product->category or $sold_kenzhekhan->kenzhekhan->category) }}">{{ $sold_product->product->category->name or $sold_kenzhekhan->kenzhekhan->category->name }} </a></td>
                                    <td><a href="{{ route('products.show', $sold_product->product) }}">{{ $sold_product->product->name }}</a></td>
                                    <td>{{ $sold_product->qty }}</td>
                                    <td>{{ format_money($sold_product->price) }}</td>
                                    <td>{{ format_money($sold_product->total_amount) }}</td>
                                    <td class="td-actions text-right">
                                        @if(!$sale->finalized_at)
                                            <a href="{{ route('sales.product.edit', ['sale' => $sale, 'soldproduct' => $sold_product]) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Edit Pedido">
                                                <i class="tim-icons icon-pencil"></i>
                                            </a>
                                            <form action="{{ route('sales.product.destroy', ['sale' => $sale, 'soldproduct' => $sold_product]) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Delete Pedido" onclick="confirm('Вы уверены, что хотите удалить этот заказ? Ваша регистрация будет удалена из этой продажи.') ? this.parentElement.submit() : ''">
                                                    <i class="tim-icons icon-simple-remove"></i>
                                                </button>
                                            </form>
                                        @endif
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

@push('js')
    <script src="{{ asset('assets/js/sweetalert2.js') }}"></script>
@endpush