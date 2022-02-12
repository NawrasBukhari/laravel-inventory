<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@if (trim($__env->yieldContent('template_title')))@yield('template_title') | @endif {{ trans('installer_messages.title') }}</title>

        <link rel="icon" type="image/png" href="{{ asset('installer/img/logo.png') }}" sizes="16x16"/>
        <link rel="icon" type="image/png" href="{{ asset('installer/img/logo.png') }}" sizes="32x32"/>
        <link rel="icon" type="image/png" href="{{ asset('installer/img/logo.png') }}" sizes="96x96"/>
        <link href="{{ asset('installer/css/style.min.css') }}" rel="stylesheet"/>
        @yield('style')
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
    </head>
    <body>
    <style>
        .tooltip {
            display:inline-block;
            position:relative;
            border-bottom:1px;
            text-align:right;
            color: #f2f2f2;
        }

        .tooltip h3 {
            margin:12px 0;
            color: #f2f2f2;
        }

        .tooltip .bottom {
            min-width:200px;
            max-width:400px;
            top:-20px;
            left:50%;
            transform:translate(-30%,-100%);
            padding:10px 20px;
            color:#ffffff;
            background-color: #ffa69e;
            background-image: linear-gradient(315deg, #ffa69e 0%, #5d4954 74%);
            font-weight:normal;
            font-size:12px;
            border-radius:8px;
            position:absolute;
            z-index:99999999;
            box-sizing:border-box;
            box-shadow:0 1px 8px rgba(0,0,0,0.5);
            display:none;
        }

        .tooltip:hover .bottom {
            display:block;
        }

        .tooltip .bottom img {
            /*width:50px;*/
            /*height: 50px;*/
        }

        .tooltip .bottom i {
            position:absolute;
            bottom:100%;
            left:50%;
            margin-left:-12px;
            width:64px;
            height:64px;
            overflow:hidden;
        }

        .tooltip .bottom i::after {
            content:'';
            position:absolute;
            width:15px;
            height:15px;
            left:50%;
            transform:translate(-50%,-50%) rotate(45deg);
            background-color:#009cdc;
            box-shadow:0 1px 8px rgba(0,0,0,0.5);
        }
    </style>
        <div class="master">
            <div class="box">
                <div style="background-color: #6b0f1a;
                background-image: linear-gradient(180deg, #6b0f1a 0%, #b91372 74%);"
                     class="header">
                    <h1 class="header__title">@yield('title')</h1>
                </div>
                <ul class="step">
                    <li class="step__divider"></li>
                    <li class="step__item {{ isActive('LaravelInstaller::final') }}">
                        <i class="step__icon fa fa-server" aria-hidden="true"></i>
                    </li>
                    <li class="step__divider"></li>
                    <li class="step__item {{ isActive('LaravelInstaller::environment')}} {{ isActive('LaravelInstaller::environmentWizard')}} {{ isActive('LaravelInstaller::environmentClassic')}}">
                        @if(Request::is('install/environment') || Request::is('install/environment/wizard') || Request::is('install/environment/classic') )
                            <a href="{{ route('LaravelInstaller::environment') }}">
                                <i class="step__icon fa fa-cog" aria-hidden="true"></i>
                            </a>
                        @else
                            <i class="step__icon fa fa-cog" aria-hidden="true"></i>
                        @endif
                    </li>
                    <li class="step__divider"></li>
                    <li class="step__item {{ isActive('LaravelInstaller::permissions') }}">
                        @if(Request::is('install/permissions') || Request::is('install/environment') || Request::is('install/environment/wizard') || Request::is('install/environment/classic') )
                            <a href="{{ route('LaravelInstaller::permissions') }}">
                                <i class="step__icon fa fa-key" aria-hidden="true"></i>
                            </a>
                        @else
                            <i class="step__icon fa fa-key" aria-hidden="true"></i>
                        @endif
                    </li>
                    <li class="step__divider"></li>
                    <li class="step__item {{ isActive('LaravelInstaller::requirements') }}">
                        @if(Request::is('install') || Request::is('install/requirements') || Request::is('install/permissions') || Request::is('install/environment') || Request::is('install/environment/wizard') || Request::is('install/environment/classic') )
                            <a href="{{ route('LaravelInstaller::requirements') }}">
                                <i class="step__icon fa fa-list" aria-hidden="true"></i>
                            </a>
                        @else
                            <i class="step__icon fa fa-list" aria-hidden="true"></i>
                        @endif
                    </li>
                    <li class="step__divider"></li>
                    <li class="step__item {{ isActive('LaravelInstaller::welcome') }}">
                        @if(Request::is('install') || Request::is('install/requirements') || Request::is('install/permissions') || Request::is('install/environment') || Request::is('install/environment/wizard') || Request::is('install/environment/classic') )
                            <a href="{{ route('LaravelInstaller::welcome') }}">
                                <i class="step__icon fa fa-home" aria-hidden="true"></i>
                            </a>
                        @else
                            <i class="step__icon fa fa-home" aria-hidden="true"></i>
                        @endif
                    </li>
                    <li class="step__divider"></li>
                </ul>
                <div class="main">
                    @if (session('message'))
                        <p class="alert text-center">
                            <strong>
                                @if(is_array(session('message')))
                                    {{ session('message')['message'] }}
                                @else
                                    {{ session('message') }}
                                @endif
                            </strong>
                        </p>
                    @endif
                    @if(session()->has('errors'))
                        <div class="alert alert-danger" id="error_alert">
                            <button type="button" class="close" id="close_alert" data-dismiss="alert" aria-hidden="true">
                                 <i class="fa fa-close" aria-hidden="true"></i>
                            </button>
                            <h4>
                                <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                {{ trans('installer_messages.forms.errorTitle') }}
                            </h4>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @yield('container')
                </div>
                <div style="text-align: center; background-color: transparent">
                    <div class="footer">
                        <div class="tooltip">
                            {{__('translation.All_rights_reserved')}}
                            {{__('translation.for')}}
                            <a href="https://instagram.com/nawrasbukhari" target="_blank" style="color: indianred" >{{__('translation.author')}}</a>
                            <div class="bottom">
                                <div style="text-align: center;">
                                    <img height="80px" width="80px" src="{{asset('installer/img/author.jpg')}}" />
                                    <p>{{__('translation.why_nawras')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @yield('scripts')
        <script type="text/javascript">
            var x = document.getElementById('error_alert');
            var y = document.getElementById('close_alert');
            y.onclick = function() {
                x.style.display = "none";
            };
        </script>
    </body>
</html>
