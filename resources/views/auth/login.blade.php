@extends('layouts.app', ['class' => 'login-page', 'page' => 'Laravel Inventory', 'contentClass' => 'login-page', 'section' => 'auth'])

@section('content')
    <style>
        .g-recaptcha-outer{
            text-align: center;
            border-radius: 2px;
            background: #f9f9f9;
            border-style: solid;
            border-color: #37474f;
            border-width: 1px;
            border-bottom-width: 2px;
        }
        .g-recaptcha-inner{
            width: 154px;
            height: 82px;
            overflow: hidden;
            margin: 0 auto;
        }
        .g-recaptcha{
            position:relative;
            left: -2px;
            top: -1px;
        }
    </style>
     <div style="padding-top: 110px" class="col-lg-4 col-md-6 ml-auto mr-auto">
        <form class="form" method="post" action="{{ route('login') }}">
            @csrf
            <div class="card card-login card-black my-auto">
                <div class="card-header">
                    <img height="180px" width="100%" src="{{ asset('assets/img/card-primary-1.png') }}" alt="">
                        <h1 class="card-title">{{__('translation.Login')}}</h1>
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
                    <div class="g-recaptcha-outer">
                        <div class="g-recaptcha-inner">
                            <div class="input-group">
                                {!! app('captcha')->display() !!}
                                <div class="g-recaptcha">
                                    @if ($errors->has('g-recaptcha-response'))
                                        <span class="text-danger">
                                            <div class="alert alert-danger" role="alertdialog"> {{ $errors}} </div>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-lg btn-block mb-3">{{__('translation.Login')}}</button>
                    <div class="text-center">
{{--                        <h6>--}}
{{--                            <a href="{{ route('password.request') }}" class="link footer-link">{{__('translation.I_forgot_the_password')}}</a>--}}
{{--                        </h6>--}}
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
