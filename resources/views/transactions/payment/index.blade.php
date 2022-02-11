@extends('layouts.app', ['page' => 'Payments', 'pageSlug' => 'payments', 'section' => 'transactions'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{__('translation.payments')}}</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('transactions.create', ['type' => 'payment']) }}" class="btn btn-sm btn-primary">{{__('translation.New_Payment')}}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col">{{__('translation.Date')}}</th>
                                <th scope="col">{{__('translation.Provider')}}</th>
                                <th scope="col">{{__('translation.Title')}}</th>
                                <th scope="col">{{__('translation.Method')}}</th>
                                <th scope="col">{{__('translation.Amount')}}</th>
                                <th scope="col">{{__('translation.Reference')}}</th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $transaction)
                                    <tr>
                                        <td> {{ date('d-m-y', strtotime($transaction->created_at)) }}</td>
                                        <td><a href="{{ route('providers.show', $transaction->provider) }}">{{ $transaction->provider->name }}</a></td>
                                        <td> {{ $transaction->title }}</td>
                                        <td><a href="{{ route('methods.show', $transaction->method) }}">{{ $transaction->method->name }}</a></td>
                                        <td>{{ format_money($transaction->amount) }}</td>
                                        <td>{{ $transaction->reference }}</td>
                                        <td></td>
                                        <td class="td-actions text-right">
                                            <a href="{{ route('transactions.edit', $transaction) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Edit Payment">
                                                <i class="tim-icons icon-pencil"></i>
                                            </a>
                                            <form action="{{ route('transactions.destroy', $transaction) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Delete Payment" onclick="confirm('Вы уверены, что хотите удалить этот платеж? Записи не останется.') ? this.parentElement.submit() : ''">
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
                    <nav class="d-flex justify-content-end" aria-label="...">
                        {{ $transactions->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
