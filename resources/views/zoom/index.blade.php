@extends('layouts.app', ['pageSlug' => 'zoom', 'page' => 'zoom', 'section' => 'zoom'])

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-8">
                    <h4 class="card-title">{{__('translation.zoom')}}</h4>
                </div>
                <div class="col-4 text-right">
                    <a href="{{ route('zoom.create') }}" class="btn btn-sm btn-primary">{{__('translation.New_Meeting')}}</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table tablesorter" id="">

                    <thead class=" text-primary">
                    <th scope="col">{{__('translation.user_id')}}</th>
                    <th scope="col">{{__('translation.meeting_id')}}</th>
                    <th scope="col">{{__('translation.topic')}}</th>
                    <th scope="col">{{__('translation.start_time')}}</th>
                    <th scope="col">{{__('translation.duration')}}</th>
                    <th scope="col">{{__('translation.Password')}}</th>
                    <th scope="col">{{__('translation.join_url')}}</th>
                    <th scope="col"></th>
                    </thead>
                    <tbody>
                    @foreach ($zoom_meetings as $zoom)
                        <tr>
                            <td>{{ $zoom->user_id }}</td>
                            <td>{{ $zoom->meeting_id }}</td>
                            <td>{{ $zoom->topic }}</td>
                            <td>{{ $zoom->start_time }}</td>
                            <td>{{ $zoom->duration }}</td>
                            <td>{{ $zoom->password }}</td>
                            <td><a href="{{ $zoom->join_url }}" target="_blank">Join</a></td>
{{--                            <td class="td-actions text-right">--}}
{{--                                <form action="{{ route('zoom.destroy', $zoom) }}" method="post" id="delete" class="d-inline">--}}
{{--                                    @csrf--}}
{{--                                    @method('DELETE')--}}
{{--                                    <button type="button" class="btn btn-link" data-toggle="tooltip"--}}
{{--                                            data-placement="bottom" title="{{__('translation.Delete_Product')}}"--}}
{{--                                            onclick="submitResult(event)">--}}
{{--                                        <i class="tim-icons icon-simple-remove"></i>--}}
{{--                                    </button>--}}
{{--                                </form>--}}
{{--                            </td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
