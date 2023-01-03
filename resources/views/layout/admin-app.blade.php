<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de votacion Online {{ $title }}</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    @livewireStyles

</head>

<body style="background-color: rgb(224, 224, 224);">
    <div class="container-fluid p-2">
        <h1 class="text-center">sistema de votacion online</h1>
        {{-- @if (Auth::guard('admin')->user->username) --}}
        <h4 class="text-center">{{ Auth::guard('admin')->user()->username }}</h4>
        {{-- @endif --}}
    </div>
    <hr>
    <div class="container">
        <div class="row flex justify-content-center">
            <div class="col-xl-2 my-3 col-lg-2 col-md-3 col-sm-4 col-3">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-danger w-100">dashboard</a>

            </div>
            <div class="col-xl-2 my-3 col-lg-2 col-md-3 col-sm-4 col-3">
                <a href="{{ route('admin.votes') }}" class="btn btn-danger w-100">Votos</a>

            </div>
            <div class="col-xl-2 my-3 col-lg-2 col-md-3 col-sm-4 col-3">
                <a href="{{ route('admin.positions') }}" class="btn btn-danger w-100">Posiciones</a>
            </div>
            <div class="col-xl-2 my-3 col-lg-2 col-md-3 col-sm-4 col-3">
                <a href="{{ route('admin.condidates') }}" class="btn btn-danger w-100">Condidatos</a>
            </div>
            <div class="col-xl-2 my-3 col-lg-2 col-md-3 col-sm-4 col-3">
                <a href="{{ route('admin.voters') }}" class="btn btn-danger w-100">Votantes</a>

            </div>
            <div class="col-xl-2 my-3 col-lg-2 col-md-3 col-sm-4 col-3">
                <a href="{{ route('admin.settings') }}" class="btn btn-danger w-100">configuraciones</a>

            </div>
            <div class="col-xl-2 my-3 col-lg-2 col-md-3 col-sm-4 col-3">
                <div class="dropdown">
                    <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown">
                        {{ Auth::guard('admin')->user()->username }}
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item btn btn-danger"
                                href="{{ route('admin.change_password') }}">cambiar cotrasena</a></li>
                        <li>
                            @livewire('admin.logout')
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    {{ $slot }}
    <footer class="bg-dark text-center p-2">
        <h4 class="text-white">Sistema de votacion - software 1</h4>
    </footer>
    <!-- Latest compiled JavaScript -->
    <script src=" {{ asset('js/bootstrap.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    @livewireScripts
</body>

</html>
