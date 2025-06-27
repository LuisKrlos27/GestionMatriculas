<!DOCTYPE html>
<html lang="en" data-theme="pastel">
<head>
    @vite('resources/css/app.css')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión Matrículas</title>
</head>
<body>
    <div class="navbar bg-base-100 shadow-sm">
        <div class="navbar-start">
            <div class="dropdown">
                <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </div>
                <ul class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                    <li><a href="{{ route('estudiantes.index') }}">Estudiantes</a></li>
                    <li><a>Docentes</a></li>
                    <li><a>Matriculas</a></li>
                </ul>
            </div>
            <a class="btn btn-ghost text-xl">Gestión Matrículas</a>
        </div>
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1">
                <li>
                    <details>
                        <summary>Estudiantes</summary>
                        <ul class="p-2">
                            <li><a href="{{ route('estudiantes.index') }}">Listar estudiantes</a></li>
                        </ul>
                    </details>
                </li>
                <li>
                    <details>
                        <summary>Docentes</summary>
                        <ul class="p-2">
                            <li><a href="#">Listar docentes</a></li>
                        </ul>
                    </details>
                </li>
                <li><a href="#">Matriculas</a></li>
            </ul>
        </div>
        <div class="navbar-end">
            <a class="btn">Login</a>
        </div>
    </div>

    <div class="p-4">
        @yield('content')
    </div>
</body>
</html>
