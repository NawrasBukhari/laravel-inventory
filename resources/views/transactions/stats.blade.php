@extends('layouts.app', ['pageSlug' => 'tstats', 'page' => 'Statistics', 'section' => 'transactions'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{__('translation.Transaction_Statistics')}}</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('transactions.index') }}" class="btn btn-sm btn-primary">
                                {{__('translation.View_Transactions')}}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>{{__('translation.Period')}}</th>
                                <th>{{__('translation.transactions')}}</th>
                                <th>{{__('translation.Income')}}</th>
                                <th>{{__('translation.Expenses')}}</th>
                                <th>{{__('translation.payments')}}</th>
                                <th>{{__('translation.Cash_Balance')}}</th>
                                <th>{{__('translation.Total_balance')}}</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach ($transactionsperiods as $period => $data)
                                    <tr>
                                        <td>{{ $period }}</td>
                                        <td>{{ $data->count() }}</td>
                                        <td>{{ format_money($data->where('type', 'income')->sum('amount')) }}</td>
                                        <td>{{ format_money($data->where('type', 'expense')->sum('amount')) }}</td>
                                        <td>{{ format_money($data->where('type', 'payment')->sum('amount')) }}</td>
                                        <td>{{ format_money($data->where('payment_method_id', optional($methods->where('name', 'Cash')->first())->id)->sum('amount')) }}</td>
                                        <td>{{ format_money($data->sum('amount')) }}</td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-tasks">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{__('translation.Pending_Balances')}}</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('clients.index') }}" class="btn btn-sm btn-primary">{{__('translation.View_Clients')}}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-full-width table-responsive">
                        <table class="table">
                            <thead>
                                <th>{{__('translation.Client')}}</th>
                                <th>{{__('translation.Purchases')}}</th>
                                <th>{{__('translation.transactions')}}</th>
                                <th>{{__('translation.Balance')}}</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach($clients as $client)
                                    <tr>
                                        <td><a href="{{ route('clients.show', $client) }}">{{ $client->name }}<br>{{ $client->document_type }}-{{ $client->document_id }}</a></td>
                                        <td>{{ $client->sales->count() }}</td>
                                        <td>{{ format_money($client->transactions->sum('amount')) }}</td>
                                        <td>
                                            @if ($client->balance > 0)
                                                <span class="text-success">{{ format_money($client->balance) }}</span>
                                            @elseif ($client->balance < 0.00)
                                                <span class="text-danger">{{ format_money($client->balance) }}</span>
                                            @else
                                                {{ format_money($client->balance) }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('clients.transactions.add', $client) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Register Transation">
                                                <i class="tim-icons icon-simple-add"></i>
                                            </a>
                                            <a href="{{ route('clients.show', $client) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="See Client">
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

        <div class="col-md-6">
            <div class="card card-tasks">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{__('translation.Statistics_by_Methods')}}</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('methods.index') }}" class="btn btn-sm btn-primary">{{__('translation.View_Methods')}}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-full-width table-responsive">
                        <table class="table">
                            <thead>
                                <th>{{__('translation.Method')}}</th>
                                <th>{{__('translation.transactions')}} {{ $date->year }}</th>
                                <th>{{__('translation.Balance')}} {{ $date->year }}</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach($methods as $method)
                                    <tr>
                                        <td><a href="{{ route('methods.show', $method) }}">{{ $method->name }}</a></td>
                                        <td>{{ format_money($transactionsperiods['Year']->where('payment_method_id', $method->id)->count()) }}</td>
                                        <td>{{ format_money($transactionsperiods['Year']->where('payment_method_id', $method->id)->sum('amount')) }}</td>
                                        <td>
                                            <a href="{{ route('methods.show', $method) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="See Method">
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
    </div>

    <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">{{__('translation.Sales_Statistics')}}</h4>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('sales.index') }}" class="btn btn-sm btn-primary">{{__('translation.View_Sales')}}</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>{{__('translation.Period')}}</th>
                        <th>{{__('translation.Sales')}}</th>
                        <th>{{__('translation.Clients')}}</th>
                        <th>{{__('translation.Total_Stock')}}</th>
                        <th data-toggle="tooltip" data-placement="bottom" title="{{__('translation.Average_revenue_for_each_sale')}}">
                            {{__('translation.Average')}}</th>
                        <th>{{__('translation.Billed_Amount')}}</th>
                        <th>{{__('translation.TO_FINALIZE')}}</th>
                    </thead>
                    <tbody>
                        @foreach ($salesperiods as $period => $data)
                            <tr>
                                <td>{{ $period }}</td>
                                <td>{{ $data->count() }}</td>
                                <td>{{ $data->groupBy('client_id')->count() }}</td>
                                <td>{{ $data->where('finalized_at', '!=', null)->map(function ($sale) {return $sale->products->sum('qty');})->sum() }}</td>
                                <td>{{ format_money($data->avg('total_amount')) }}</td>
                                <td>{{ format_money($data->where('finalized_at', '!=', null)->map(function ($sale) {return $sale->products->sum('total_amount');})->sum()) }}</td>
                                <td>{{ $data->where('finalized_at', null)->count() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
@endsection