@extends('layouts.app', ['page' => __('Challenge'), 'pageSlug' => 'challenge', 'section' => 'users'])

@section('content')
        <div class="row justify-content-center" style="padding-top: 20%">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Confirm Authentication code') }}</div>
                    <div class="card-body align-content-center">
                        <form method="POST" action="{{ route('two-factor.login') }}">
                            @csrf
                            <div style="text-align: center;">
                                <div class="row mb-3 align-content-center">

                                    <div class="col-md-6">

                                        <input id="code" type="text"
                                               class="form-control @error('code') is-invalid @enderror"
                                               name="code" required autocomplete="current-code">

                                        @error('code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Confirm code') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
