<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
   

    <title>{{ config('app.name', 'Digibook') }}</title>
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://unpkg.com/alpinejs@3.1.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-info">
    <div id="app">
        <nav class="navbar navbar-expand-md shadow-sm" style="background-color:#43193f;" >
            <div class="container ">
                <div class="row">
                    <div class="col-12">

                        <a class="navbar-brand text-dark" href="{{ url('/home') }}">
                            <div class="justify-content-center">
                                <img src="img/libro.png">
                                <h3 class="fst-italic text-white">DigiBOOK</h3>
                                
                            </div>
                            
                        </a>
                    </div>
                </div>
                <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-white fs-3" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white fs-3" href="{{ route('register') }}">{{ __('Registro') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white fs-5" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>General</a>
                                <div class="dropdown-menu dropdown-menu bg-warning "  aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{url('usuarios')}}">Usuarios</a>
                                    <a class="dropdown-item" href="{{url('roles')}}">Roles</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown text-white" class="nav-link dropdown-toggle text-white fs-5" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Acervo</a>
                                <div class="dropdown-menu dropdown-menu bg-warning" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{url('authors')}}">Autores</a>
                                    <a class="dropdown-item" href="{{url('categories')}}">Categorias</a>
                                    <a class="dropdown-item" href="{{url('publishers')}}">Editoriales</a>
                                    <a class="dropdown-item" href="{{url('books')}}">Libros</a>
                                    
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown text-dark" class="nav-link dropdown-toggle text-white fs-5" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Consultas</a>
                                <div class="dropdown-menu dropdown-menu bg-warning" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{url('loans')}}">Prestamos</a>
                                    <a class="dropdown-item" href="{{url('returns')}}">Devoluciones</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white fs-5" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end bg-warning" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('/home') }}""
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        <script src="https://unpkg.com/alpinejs@3.1.x/dist/cdn.min.js" defer></script>
        @stack("scripts")
    </div>
</body>
</html>
