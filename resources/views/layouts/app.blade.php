<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no,shrink-to-fit=yes">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $page }} - {{ env('APP_NAME') }}</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
            integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@100;200;300;400;500;600&display=swap"
          rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.css" rel="stylesheet">
    <!-- CSS -->
    <link href="{{ asset('assets/css/black-dashboard.css?v=1.0.0') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/black-theme.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/black-nucleo-icons.css?v=1.0.0') }}" rel="stylesheet"/>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    {!! NoCaptcha::renderJs() !!}
    @include('sweetalert::alert')

</head>

<body class="black-content {{ $class ?? '' }}">
@auth()
    <div class="wrapper">
        @include('layouts.navbars.sidebar')
        <div class="main-panel">
            @include('layouts.navbars.navbar')

            <div class="content">
                @yield('content')
            </div>
            <div class="footer">
                <div class="card bg-transparent">
                    <div class="card-body">
                        <div class="bg-transparent text-justify position-relative text-light text-center">
                            <hr>
                            <span data-toggle="tooltip" data-placement="top" title="{{__('translation.why_copyright')}}"
                                  class="position-relative text-justify text-center">{{__('translation.All_rights_reserved')}}</span>
                            {{__('translation.for')}} <a href="https://instagram.com/nawrasbukhari">
                                <span
                                        data-toggle="tooltip" data-placement="top"
                                        title="{{__('translation.why_nawras')}}"
                                        class="text-danger">{{__('translation.author')}}
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@else
    @include('layouts.navbars.navbar')
    <div class="wrapper wrapper-full-page">
        <div class="full-page {{ $contentClass ?? '' }}">
            <div class="content">
                <div class="container">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>

@endauth

<script src="{{ asset('assets/js/black-core/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/black-core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/black-core/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/black-plugins/perfect-scrollbar.jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/black-plugins/chartjs.min.js') }}"></script>
<script src="{{ asset('assets/js/black-plugins/bootstrap-notify.js') }}"></script>
<script src="{{ asset('assets/js/black-dashboard.min.js') }}"></script>
<script src="{{ asset('assets/js/theme.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://unpkg.com/xzoom/dist/xzoom.min.js"></script>
<script>
    $(document).ready(function () {
        $().ready(function () {
            $sidebar = $('.sidebar');
            $navbar = $('.navbar');
            $main_panel = $('.main-panel');

            $full_page = $('.full-page');

            $sidebar_responsive = $('body > .navbar-collapse');
            sidebar_mini_active = true;
            white_color = false;

            window_width = $(window).width();

            fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

            $('.fixed-plugin a').click(function (event) {
                if ($(this).hasClass('switch-trigger')) {
                    if (event.stopPropagation) {
                        event.stopPropagation();
                    } else if (window.event) {
                        window.event.cancelBubble = true;
                    }
                }
            });

            $('.fixed-plugin .background-color span').click(function () {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data', new_color);
                }

                if ($main_panel.length != 0) {
                    $main_panel.attr('data', new_color);
                }

                if ($full_page.length != 0) {
                    $full_page.attr('filter-color', new_color);
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.attr('data', new_color);
                }
            });

            $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function () {
                var $btn = $(this);

                if (sidebar_mini_active == true) {
                    $('body').removeClass('sidebar-mini');
                    sidebar_mini_active = false;
                    whiteDashboard.showSidebarMessage('Sidebar mini deactivated...');
                } else {
                    $('body').addClass('sidebar-mini');
                    sidebar_mini_active = true;
                    whiteDashboard.showSidebarMessage('Sidebar mini activated...');
                }

                // we simulate the window Resize so the charts will get updated in realtime.
                var simulateWindowResize = setInterval(function () {
                    window.dispatchEvent(new Event('resize'));
                }, 180);

                // we stop the simulation of Window Resize after the animations are completed
                setTimeout(function () {
                    clearInterval(simulateWindowResize);
                }, 1000);
            });

            $('.switch-change-color input').on("switchChange.bootstrapSwitch", function () {
                var $btn = $(this);

                if (white_color == true) {
                    $('body').addClass('change-background');
                    setTimeout(function () {
                        $('body').removeClass('change-background');
                        $('body').removeClass('white-content');
                    }, 900);
                    white_color = false;
                } else {
                    $('body').addClass('change-background');
                    setTimeout(function () {
                        $('body').removeClass('change-background');
                        $('body').addClass('white-content');
                    }, 900);

                    white_color = true;
                }
            });

            $('.light-badge').click(function () {
                $('body').addClass('white-content');
            });

            $('.dark-badge').click(function () {
                $('body').removeClass('white-content');
            });
        });
    });
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

    function submitResult(e) {
        e.preventDefault();
        Swal.fire({
            title: 'уверены ли вы?',
            text: "Вы не сможете отменить это!",
            icon: 'предупреждение!',
            showCancelButton: true,
            confirmButtonColor: '#5fd630',
            cancelButtonColor: '#d21c1c',
            confirmButtonText: 'Удалить!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Удалено!!',
                    'Ваш файл удален!',
                    'успешно удален!'
                )
                document.getElementById("delete").submit();
            }
        })
    }


</script>
{{--Bootbox--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"
        integrity="sha512-RdSPYh1WA6BF0RhpisYJVYkOyTzK4HwofJ3Q7ivt/jkpW6Vc8AurL1R+4AUcvn9IwEKAPm/fk7qFZW3OuiUDeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.js"
        integrity="sha512-K3MtzSFJk6kgiFxCXXQKH6BbyBrTkTDf7E6kFh3xBZ2QNMtb6cU/RstENgQkdSLkAZeH/zAtzkxJOTTd8BqpHQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@stack('js')

</body>
</html>
