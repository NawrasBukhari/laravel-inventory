@extends('layouts.app', ['page' => 'New zoom', 'pageSlug' => 'zoom', 'section' => 'zoom'])
@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{__('translation.New_Zoom')}}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('zoom.index') }}"
                                   class="btn btn-sm btn-primary">{{__('translation.Back_to_List')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('zoom.store') }}" enctype="multipart/form-data"
                              autocomplete="off">
                            @csrf
                            <h6 class="heading-small text-muted mb-4">{{__('translation.topic')}}</h6>
                            <div class="pl-lg-4">

                                <div class="form-group{{ $errors->has('topic') ? ' has-danger' : '' }}">
                                    <label class="form-control-label"
                                           for="input-topic">{{__('translation.topic')}}</label>
                                    <input data-toggle="tooltip" data-placement="top"
                                           title="{{__('translation.topic')}}" type="text" name="topic"
                                           id="input-topic"
                                           class="form-control form-control-alternative{{ $errors->has('topic') ? ' is-invalid' : '' }}"
                                           placeholder="{{__('translation.topic')}}" value="{{ old('topic') }}"
                                           required autofocus>
                                    @include('alerts.feedback', ['field' => 'topic'])
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                            <label class="form-control-label"
                                                   for="input-duration">{{__('translation.Password')}}</label>
                                            <input data-toggle="tooltip" data-placement="top"
                                                   title="{{__('translation.Password')}}" type="text"
                                                   name="password" id="input-password"
                                                   class="form-control form-control-alternative"
                                                   placeholder="{{__('translation.Password')}}"
                                                   value="{{ old('password') }}" required>
                                            @include('alerts.feedback', ['field' => 'password'])
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group{{ $errors->has('duration') ? ' has-danger' : '' }}">
                                            <label class="form-control-label"
                                                   for="input-duration">{{__('translation.duration')}}</label>
                                            <input data-toggle="tooltip" data-placement="top"
                                                   title="{{__('translation.duration')}}" type="number"
                                                   min="1" max="40"
                                                   name="duration" id="input-duration"
                                                   class="form-control form-control-alternative"
                                                   placeholder="{{__('translation.duration')}}"
                                                   value="{{ old('duration') }}" required>
                                            @include('alerts.feedback', ['field' => 'duration'])
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group{{ $errors->has('start_time') ? ' has-danger' : '' }}">
                                            <label class="form-control-label"
                                                   for="input-description">{{__('translation.start_time')}}</label>
                                            <input data-toggle="tooltip" data-placement="top"
                                                   title="{{__('translation.start_time')}}" type="datetime-local"
                                                   name="start_time"
                                                   id="input-start_time" class="form-control form-control-alternative"
                                                   placeholder="{{__('translation.start_time')}}"
                                                   value="{{ old('start_time') }}" required>
                                            @include('alerts.feedback', ['field' => 'start_time'])
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">{{__('translation.Save')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush

