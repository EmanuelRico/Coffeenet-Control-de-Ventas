<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

        <!--Title-->
        <title>
            @yield('title')
        </title>
        
    </head>
    <body class="font-sans antialiased bg-white">
        <div class="container-fluid d-flex">
            <a href="/"><img src="{{ asset('assets/logo.jpeg') }}" style="max-height: 60px;" alt=""></a>
        </div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary py-3 sticky-top">
            <div class="container-fluid container-xxl">
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item fw-bold fs-5">
                            @if (Route::has('login'))
                                @auth
                                    <a class="nav-link text-white" href="/dashboard">Inicio</a>
                                @else
                                    <a class="nav-link text-white" href="/">Inicio</a>
                                @endif
                            @endif
                        </li>
                        <li class="nav-item fw-bold fs-5">
                            <a class="nav-link text-white" href="/productos">Productos</a>
                        </li>
                        <li class="nav-item fw-bold fs-5">
                            <a class="nav-link text-white" href="/nosotros">Nosotros</a>
                        </li>
                    </ul>
    
                    <li class="nav-item dropdown pt-1 pt-lg-0 d-flex align-items-center">
                        <a class="nav-link dropdown-toggle px-0 fa-solid fa-user fa-lg text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                        <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="navbarDropdown">
                            @if (Route::has('login'))
                                @auth
                                    <h6 class="dropdown-header small text-muted">
                                        {{ __('Administraci??n de cuenta') }}
                                    </h6>
        
                                    <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                        {{ __('Mi Perfil') }}
                                    </x-jet-dropdown-link>
                                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                        <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                            {{ __('API Tokens') }}
                                        </x-jet-dropdown-link>
                                    @endif

                                    <hr class="dropdown-divider">

                                    <x-jet-dropdown-link href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesi??n') }}
                                    </x-jet-dropdown-link>
                                    <form method="POST" id="logout-form" action="{{ route('logout') }}">
                                        @csrf
                                    </form>
                                @else
                                    <li><a class="fs-6 me-1 dropdown-item" href="{{ route('login') }}">Inicia Sesi??n</a></li>
                                @endif
                            @endif
                        </ul>
                    </li>
                </div>
            </div>
        </nav>

        <!-- Page Heading -->
        {{-- <header class="d-flex py-3 bg-white shadow-sm border-bottom">
            <div class="container">
                {{ $header }}
            </div>
        </header> --}}
        
        <!-- Page Content -->
        {{-- <main class="container my-5">
             {{ $slot }} 
        </main> --}}
        <div class="container-100">
            @yield('content')
        </div>

        <footer class="footer py-3 bg-primary text-white">
            <div class="d-flex justify-content-center">
                <h2 class="fw-bolder m-0">CoffeeNet</h2>
                {{-- <div>
                    <a class="btn btn-primary" type="submit"><i class="title-hover fa-brands fa-xl fa-instagram"></i></a>
                    <a class="btn btn-primary" type="submit"><i class="title-hover fa-brands fa-xl fa-facebook-square"></i></a>
                </div> --}}
            </div>
            <p class="text-center p-0 m-0">Hecho por Emanuel Rico Mart??nez</p>
        </footer>

        @stack('modals')

        @livewireScripts

        @stack('scripts')
        
    </body>
</html>