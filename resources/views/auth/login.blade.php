@extends('layouts.app', ['class' => 'login-page', 'page' => 'Laravel Inventory', 'contentClass' => 'login-page', 'section' => 'auth'])

@section('content')
    @if(env('THEME')==1)
        <div style="height: 55vh" class="col-lg-4 col-md-6 ml-auto mr-auto">
        @elseif(env('THEME')==2)
        <div style="padding-top: 110px" class="col-lg-4 col-md-6 ml-auto mr-auto">
        @endif
        <form class="form" method="post" action="{{ route('login') }}">
            @csrf
            @if(env('THEME')==1)
                <div class="card card-login card-white my-auto">
            @elseif(env('THEME')==2)
                <div class="card card-login card-black my-auto">
            @endif
                <div class="card-header">
                    @if(env('THEME')==1)
                        <img src="{{ asset('assets/img/card-primary-1.png') }}" alt="">
                        <h1 class="card-title">{{__('translation.Login')}}</h1>
                    @elseif(env('THEME')==2)
                        <img height="180px" width="100%" src="{{ asset('assets/img/card-primary-1.png') }}" alt="">
                        <h1 class="card-title">{{__('translation.Login')}}</h1>
                    @endif
                </div>
                <div class="card-body">
                    <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-email-85"></i>
                            </div>
                        </div>
                        <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{__('translation.Email')}}">
                        @include('alerts.feedback', ['field' => 'email'])
                    </div>
                    <div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-lock-circle"></i>
                            </div>
                        </div>
                        <input type="password" placeholder="{{__('translation.Password')}}" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}">
                        @include('alerts.feedback', ['field' => 'password'])
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-lg btn-block mb-3">{{__('translation.Login')}}</button>
                    <div class="text-center">
                        <h6>
                            <a href="{{ route('password.request') }}" class="link footer-link">{{__('translation.I_forgot_the_password')}}</a>
                        </h6>
                    </div>
                </div>
            </div>
        </form>

        <div class="text-center text-black-60">
            <hr>
            <span data-toggle="tooltip" data-placement="top" title="{{__('translation.why_copyright')}}" class="position-relative text-justify text-center">{{__('translation.All_rights_reserved')}}</span> for <a target="_blank" href="https://instagram.com/nawrasbukhari"><span data-toggle="tooltip" data-placement="top" title="{{__('translation.why_nawras')}}" class="text-danger">{{__('translation.author')}}</span></a>
        </div>
    </div>
@endsection
