@extends('layouts.app', ['pageSlug' => 'settings', 'page' => 'settings', 'section' => 'settings'])

@section('content')
    <div class="alert alert-danger" role="alert">
        For Admin Settings
    </div>
    <div class="card">
        <div class="card-header">
            <h1>High</h1>
            <div class="card-body">
                <h2>Middle</h2>
                <div class="card-footer">
                    <h3>Low</h3>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
