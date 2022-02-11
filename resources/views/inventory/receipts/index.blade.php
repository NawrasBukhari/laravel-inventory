@extends('layouts.app', ['page' => 'Receipts', 'pageSlug' => 'receipts', 'section' => 'inventory'])

@section('content')
    @include('alerts.success')
    <div class="row">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">{{__('translation.Receipts')}}</h4>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('receipts.create') }}" class="btn btn-sm btn-primary">{{__('translation.New_Receipt')}}</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="">
                    <table class="table">
                        <thead>
                            <th>{{__('translation.Date')}}</th>
                            <th>{{__('translation.Title')}}</th>
                            <th>{{__('translation.Provider')}}</th>
                            <th>{{__('translation.Products')}}</th>
                            <th>{{__('translation.stock')}}</th>
                            <th>{{__('translation.Defective_Stock')}}</th>
                            <th>{{__('translation.Status')}}</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach ($receipts as $receipt)
                                <tr>
                                    <td>{{ date('d-m-y', strtotime($receipt->created_at)) }}</td>
                                    <td style="max-width:150px">{{ $receipt->title }}</td>
                                    <td>
                                        @if($receipt->provider_id)
                                            <a href="{{ route('providers.show', $receipt->provider) }}">{{ $receipt->provider->name }}</a>
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>{{ $receipt->products->count() }}</td>
                                    <td>{{ $receipt->products->sum('stock') }}</td>
                                    <td>{{ $receipt->products->sum('stock_defective') }}</td>
                                    <td>
                                        @if($receipt->finalized_at)
                                            FINALIZED
                                        @else
                                            <span style="color:red; font-weight:bold;">{{__('translation.TO_FINALIZE')}}</span>
                                        @endif
                                    </td>
                                    <td class="td-actions text-right">
                                        @if($receipt->finalized_at)
                                            <a href="{{ route('receipts.show', ['receipt' => $receipt]) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Ver Receipt">
                                                <i class="tim-icons icon-zoom-split"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('receipts.show', ['receipt' => $receipt]) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Edit Receipt">
                                                <i class="tim-icons icon-pencil"></i>
                                            </a>
                                        @endif
                                        <form action="{{ route('receipts.destroy', $receipt) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Delete Receipt" onclick="confirm('Вы уверены, что хотите удалить эту квитанцию? Все ваши записи будут безвозвратно удалены, если запас товаров уже закончился они останутся.') ? this.parentElement.submit() : ''">
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
                    {{ $receipts->links() }}
                </nav>
            </div>
        </div>
    </div>
@endsection
