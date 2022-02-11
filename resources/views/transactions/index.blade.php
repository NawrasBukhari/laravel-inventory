@extends('layouts.app', ['page' => 'Transactions', 'pageSlug' => 'transactions', 'section' => 'transactions'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{__('translation.transactions')}}</h4>
                        </div>
                        <div class="col-4 text-right">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#transactionModal">
                                {{__('translation.New_Transaction')}}
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th>{{__('translation.Date')}}</th>
                                <th>{{__('translation.Type')}}</th>
                                <th>{{__('translation.Title')}}</th>
                                <th>{{__('translation.Method')}}</th>
                                <th>{{__('translation.Amount')}}</th>
                                <th>{{__('translation.Reference')}}</th>
                                <th>{{__('translation.Client')}}</th>
                                <th>{{__('translation.Provider')}}</th>
                                <th>{{__('translation.transfers')}}</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $transaction)
                                    <tr>
                                        <td>{{ date('d-m-y', strtotime($transaction->created_at)) }}</td>
                                        <td>
                                            <a href="{{ route('transactions.type', ['type' => $transaction->type]) }}">{{ $transactionname[$transaction->type] }}</a>
                                        </td>
                                        <td style="max-width:150px">{{ $transaction->title }}</td>
                                        <td><a href="{{ route('methods.show', $transaction->method) }}">{{ $transaction->method->name }}</a></td>
                                        <td>{{ format_money($transaction->amount) }}</td>
                                        <td>{{ $transaction->reference }}</td>
                                        <td>
                                            @if ($transaction->client)
                                                <a href="{{ route('clients.show', $transaction->client) }}">{{ $transaction->client->name }}<br>{{ $transaction->client->document_type }}-{{ $transaction->client->document_id }}</a>
                                            @else
                                                {{__('translation.Does_not_apply')}}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($transaction->provider)
                                                <a href="{{ route('providers.show', $transaction->provider) }}">{{ $transaction->provider->name }}</a>
                                            @else
                                                {{__('translation.Does_not_apply')}}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($transaction->transfer)
                                                <a href="{{ route('transfer.show', $transaction->transfer) }}">ID {{ $transaction->transfer->id }}</a>
                                            @else
                                                {{__('translation.Does_not_apply')}}
                                            @endif
                                        </td>
                                        <td class="td-actions text-right">
                                            @if ($transaction->sale_id)
                                                <a href="{{ route('sales.show', $transaction->sale) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="More details">
                                                    <i class="tim-icons icon-zoom-split"></i>
                                                </a>
                                            @elseif ($transaction->transfer_id)
                                                <a href="{{ route('transfer.show', $transaction->transfer) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="More details">
                                                    <i class="tim-icons icon-zoom-split"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('transactions.edit', $transaction) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Edit Transaction">
                                                    <i class="tim-icons icon-pencil"></i>
                                                </a>
                                                <form action="{{ route('transactions.destroy', $transaction) }}" method="post" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Delete Transaction" onclick="confirm('Вы уверены, что хотите удалить эту транзакцию?') ? this.parentElement.submit() : ''">
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
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        {{ $transactions->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="transactionModal" tabindex="-1" role="dialog" aria-labelledby="transactionModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('translation.New_Transaction')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('transactions.create', ['type' => 'payment']) }}" class="btn btn-sm btn-primary">{{__('translation.Payment')}}</a>
                        <a href="{{ route('transactions.create', ['type' => 'income']) }}" class="btn btn-sm btn-primary">{{__('translation.Income')}}</a>
                        <a href="{{ route('transactions.create', ['type' => 'expense']) }}" class="btn btn-sm btn-primary">{{__('translation.Expense')}}</a>
                        <a href="{{ route('sales.create') }}" class="btn btn-sm btn-primary">{{__('translation.Sale')}}</a>
                        <a href="{{ route('transfer.create') }}" class="btn btn-sm btn-primary">{{__('translation.Transfer')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
