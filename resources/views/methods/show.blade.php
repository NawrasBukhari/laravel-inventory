@extends('layouts.app', ['page' => 'Method Information', 'pageSlug' => 'methods', 'section' => 'methods'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('translation.Method_information')}}</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>{{__('translation.ID')}}</th>
                            <th>{{__('translation.Name')}}</th>
                            <th>{{__('translation.Description')}}</th>
                            <th>{{__('translation.transactions')}}</th>
                            <th>{{__('translation.Daily_Balance')}}</th>
                            <th>{{__('translation.Weekly_Balance')}}</th>
                            <th>{{__('translation.Quarterly_Balance')}}</th>
                            <th>{{__('translation.Monthly_Balance')}}</th>
                            <th>{{__('translation.Annual_balance')}}</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $method->id }}</td>
                                <td>{{ $method->name }}</td>
                                <td>{{ $method->description }}</td>
                                <td>{{ $method->transactions->count() }}</td>
                                <td>{{ format_money($balances['daily']) }}</td>
                                <td>{{ format_money($balances['weekly']) }}</td>
                                <td>{{ format_money($balances['quarter']) }}</td>
                                <td>{{ format_money($balances['monthly']) }}</td>
                                <td>{{ format_money($balances['annual']) }}</td>
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
                    <h4 class="card-title">{{__('translation.transactions')}}: {{ $transactions->count() }}</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>{{__('translation.ID')}}</th>
                            <th>{{__('translation.Date')}}</th>
                            <th>{{__('translation.Type')}}</th>
                            <th>{{__('translation.Title')}}</th>
                            <th>{{__('translation.Amount')}}</th>
                            <th>{{__('translation.Reference')}}</th>
                        </thead>
                        <tbody>
                            @foreach($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->id }}</td>
                                    <td>{{ date('d-m-y', strtotime($transaction->created_at)) }}</td>
                                    <td><a href="{{ route('transactions.type', $transaction->type) }}">{{ $transactionname[$transaction->type] }}</a></td>
                                    <td>{{ $transaction->title }}</td>
                                    <td>{{ format_money($transaction->amount) }}</td>
                                    <td>{{ $transaction->reference }}</td>
                                    <td class="td-actions text-right">
                                        @if ($transaction->sale_id)
                                            <a href="{{ route('sales.show', $transaction->sale) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="More Details">
                                                <i class="tim-icons icon-zoom-split"></i>
                                            </a>
                                        @elseif ($transaction->transfer_id)

                                        @else
                                            <a href="{{ route('transactions.edit', $transaction) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Edit Transaction">
                                                <i class="tim-icons icon-pencil"></i>
                                            </a>
                                            <form action="{{ route('transactions.destroy', $transaction) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Delete Transaction" onclick="confirm('Вы уверены, что хотите удалить эту транзакцию? Записи не останется.') ? this.parentElement.submit() : ''">
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