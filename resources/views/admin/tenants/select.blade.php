<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Selecionar Empresa</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <meta name="title" content="">
    <link rel="apple-touch-icon" sizes="120x120" href="../../assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/img/favicon/favicon-16x16.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Fontawesome -->
    <link type="text/css" href="{{ asset('vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <!-- Notyf -->
    <link type="text/css" href="{{ asset('vendor/notyf/notyf.min.css') }}" rel="stylesheet">

    <style>
        .avatar-xl {
            width: 6rem;
            height: 6rem;
        }

        .icon {
            height: 2.875rem;
        }
    </style>
</head>

<body><noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-THQTXJ7" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <div class="container-fluid">

        <div class="row justify-content-md-center form-bg-image" data-background-lg="{{ url('img/decisions.svg') }}"
            style="background: url(&quot;{{ url('img/decisions.svg') }}&quot;);">
            <div class="col-8 mt-10">
                <div class="card shadow" style="min-height: 400px;">
                    <div class="card-header border-gray-100 d-flex justify-content-between align-items-center">
                        <h2 class="h4 mb-0">Selecionar Empresa</h2>
                    </div>
                    <div class="card-body">

                        <div class="row">

                            @include('partials.alerts')

                            @foreach ($logins as $login)

                            <div class="col-4">
                                <div class="card card-body mt-2">
                                    <h2 class="h5 mb-4">{{$login->name}}</h2>
                                    <div class="d-flex align-items-center">
                                        <div class="me-3"> <img class="rounded avatar-xl"
                                                src="{{ url('img/tenant.png') }}" alt="change cover"></div>
                                        <div class="file-field">
                                            <div class="d-flex justify-content-xl-center ms-xl-3">
                                                <div class="d-flex"><svg class="icon text-gray-500 me-2"
                                                        fill="currentColor" viewBox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>

                                                    <div class="d-md-block text-left">
                                                        <div class="fw-normal text-dark mb-1">E-mail</div>
                                                        <div class="text-gray small">{{$login->email ?:
                                                            '....'}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <a href="{{ url('access/'.$login->tenant_id) }}" class="col-12 btn btn-block btn-success"><i class="fa fa-forward"></i> Acessar</a>
                            </div>

                            @endforeach

                        </div>


                    </div>
                </div>
            </div>
        </div>


    </div>

</body>

</html>
