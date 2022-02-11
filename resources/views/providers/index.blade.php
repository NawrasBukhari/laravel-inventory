@extends('layouts.app', ['page' => 'List of Providers', 'pageSlug' => 'providers', 'section' => 'providers'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{__('translation.Providers')}}</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('providers.create') }}" class="btn btn-sm btn-primary">{{__('translation.New_Provider')}}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col">{{__('translation.Name')}}</th>
                                <th scope="col">{{__('translation.Description')}}</th>
                                <th scope="col">{{__('translation.Email')}}</th>
                                <th scope="col">{{__('translation.Telephone')}}</th>
                                <th scope="col">{{__('translation.Payments_Made')}}</th>
                                <th scope="col">{{__('translation.Total_payments')}}</th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                @foreach ($providers as $provider)
                                    <tr>
                                        <td>{{ $provider->name }}</td>
                                        <td>{{ $provider->description }}</td>

                                        <td>
                                            <a href="mailto:{{ $provider->email }}">{{ $provider->email }}</a>
                                        </td>
                                        <td>{{ $provider->phone }}</td>
                                        <td>{{ $provider->transactions->count() }}</td>
                                        <td>{{ format_money(abs($provider->transactions->sum('amount'))) }}</td>
                                        <td class="td-actions text-right">
                                            <a href="{{ route('providers.show', $provider) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="More Details">
                                                <i class="tim-icons icon-zoom-split"></i>
                                            </a>
                                            <a href="{{ route('providers.edit', $provider) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Edit Provider">
                                                <i class="tim-icons icon-pencil"></i>
                                            </a>
                                            <form action="{{ route('providers.destroy', $provider) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Delete Provider" onclick="confirm('Вы уверены, что хотите удалить этого провайдера? Записи о произведенных ему платежах не будут удалены.') ? this.parentElement.submit() : ''">
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
                        {{ $providers->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
