<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#A81B2B">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title','Planeador Académico')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">

    <!-- Icon -->
    <link rel="icon" href="{{ asset('favicon.png') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    @stack('styles')

</head>
<body>

    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
            <a class="navbar-brand mx-auto" href="/">
                <img src="/images/logo_blanco.png" alt="Planeador Académico">
            </a>

            <button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#mainNavbar"
            aria-controls="navbarPrincipal" aria-expanded="false" aria-label="Toggle navigation">
            <span><i class="fas fa-ellipsis-v"></i></span>
        </button>

        <div class="collapse navbar-collapse text-center" id="mainNavbar">
            <ul class="navbar-nav mr-auto">
                <!-- Aqui van los enlaces para cada rol -->
                @include('layouts.nav')
            </ul>
            <ul class="navbar-nav ml-auto d-flex align-items-center">
             @guest
             <li class="nav-item">
                <a href="{{route('login')}}" class="btn btn-light"> <i class="fa fa-sign-in-alt"></i> Iniciar Sesion</a>
            </li>
            @else
            <li class="nav-item pt-1">
                <a href="{{ route('perfil') }}" class="nav-link">
                    <img src="{{ Auth::user()->getAvatar() }}" class="rounded-circle z-depth-0 m-1" alt="avatar image"
                    height="35">
                    <span>{{ Auth::user()->nombre_completo() }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" href="#" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out-alt"></i>
                Cerrar Sesión
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </a>
        </li>
    </ul>
</div>
@endguest
</nav>
</header>

<div id="app">
    <div class="container">
        <div class="row">
            <div class="col">
                    @if(session()->has('msj'))
                    <div class="alert alert-success" role="alert" data-dimiss="alert">{{session('msj')}}</div>
                    @elseif(count($errors) > 0)
                    <div class="alert alert-danger" role="alert" data-dimiss="alert">
                      <h6 class="font-weight-bold">Por favor corrija los siguientes errores:</h6>
                      <ul>
                        @foreach($errors->all() as $error)
                          <li>{{$error}}</li>
                        @endforeach
                      </ul>
                    </div>
                    @endif
            </div>
        </div>
    </div>
    <main class="pt-1">
        @yield('content')
    </main>
    <!-- Footer -->
    <footer class="page-footer font-small bg-dark pt-4">
        <div class="container text-center text-md-left">
            <div class="row text-center text-md-left mt-3 pb-3">
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto">
                    <img class="img-footer" src="/images/logo_blanco.png" alt="">
                    <p class="ml-3">Creado por los estudiantes de 6to semestre en la Universidad del Valle sede
                    Pacífico.</p>
                </div>
                <hr class="w-100 clearfix d-md-none">
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold">Contactatnos</h6>
                    <p>
                        <i class="fas fa-user mr-3"></i><b>The Programers</b></p>
                        <p>
                            <i class="fas fa-envelope mr-1"></i> contacto.programers@gmail.com</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row d-flex align-items-center">
                        <div class="col-12">
                            <p class="text-center">© 2019 Copyright:
                                <a href="https://mdbootstrap.com/education/bootstrap/">
                                    <strong> jeangallego.io</strong>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- Footer -->
        </div>
        {{-- Scripts --}}
        <script src="{{ asset('js/app.js') }}"></script>
        @include('sweetalert::alert')
        @stack('scripts')
    </body>
    </html>
