@extends('layouts.app', ['page' => 'Clients', 'pageSlug' => 'clients', 'section' => 'clients'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{__('translation.Clients')}}</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('clients.create') }}" class="btn btn-sm btn-primary">{{__('translation.Add_Client')}}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('sweetalert::alert')

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th>{{__('translation.Name')}}</th>
                                <th>{{__('translation.Email_or_Telephone')}}</th>
                                <th>{{__('translation.Balance')}}</th>
                                <th>{{__('translation.Purchases')}}</th>
                                <th>{{__('translation.Total_payments')}}</th>
                                <th>{{__('translation.Last_purchase')}}</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                    <tr>
                                        <td>{{ $client->name }}<br>{{ $client->document_type }}-{{ $client->document_id }}</td>
                                        <td>
                                            <a href="mailto:{{ $client->email }}">{{ $client->email }}</a>
                                            <br>
                                            {{ $client->phone }}
                                        </td>
                                        <td>
                                            @if (round($client->balance) > 0)
                                                <span class="text-success">{{ format_money($client->balance) }}</span>
                                            @elseif (round($client->balance) < 0.00)
                                                <span class="text-danger">{{ format_money($client->balance) }}</span>
                                            @else
                                                {{ format_money($client->balance) }}
                                            @endif
                                        </td>
                                        <td>{{ $client->sales->count() }}</td>
                                        <td>{{ format_money($client->transactions->sum('amount')) }}</td>
                                        <td>{{ ($client->sales->sortByDesc('created_at')->first()) ? date('d-m-y', strtotime($client->sales->sortByDesc('created_at')->first()->created_at)) : 'N/A' }}</td>
                                        <td class="td-actions text-right">
                                            <a href="{{ route('clients.show', $client) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="More Details">
                                                <i class="tim-icons icon-zoom-split"></i>
                                            </a>
                                            <a href="{{ route('clients.edit', $client) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Edit Client">
                                                <i class="tim-icons icon-pencil"></i>
                                            </a>
                                            <form action="{{ route('clients.destroy', $client) }}" method="post" id="delete" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-link " data-toggle="tooltip" data-placement="bottom" title="Delete Client" onclick="submitResult(event)">
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
                        {{ $clients->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection

