@extends('layout')
@section('content')

<div class="max-w-7xl mx-auto p-4 bg-base-100 shadow rounded-lg">

    {{-- Mensajes de éxito o error que se muestran si existen en la sesión --}}
    @if (session('success'))
        <div id="success-alert" class="alert alert-success shadow-lg mb-4 md:col-span-4 transition-opacity duration-500">
            <div>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif

    @if (session('error'))
        <div id="error-alert" class="alert alert-error shadow-lg mb-4 md:col-span-4 transition-opacity duration-500">
            <div>
                <span>{{ session('error') }}</span>
            </div>
        </div>
    @endif

    <div class="relative flex items-center justify-center mb-4">
        <!-- Título centrado absolutamente -->
        <h2 class="text-xl font-bold absolute left-1/2 transform -translate-x-1/2">HORARIO ACADÉMICO</h2>

        <!-- Botón alineado a la derecha -->
        <a href="{{ route('horarios.create') }}" class="btn btn-success ml-auto">+ Agregar horario</a>
    </div>

    {{-- Tabla que organiza el horario por bloque (mañana/tarde) y día --}}
    <table class="table table-zebra text-center text-sm w-full">
        <thead>
            <tr>
                <th>Bloque</th>
                <th>Lunes</th>
                <th>Martes</th>
                <th>Miércoles</th>
                <th>Jueves</th>
                <th>Viernes</th>
                <th>Sábado</th>
            </tr>
        </thead>
        <tbody>
            {{-- Iteramos los bloques: mañana y tarde --}}
            @foreach (['mañana' => '8:00 - 12:00', 'tarde' => '2:00 - 6:00'] as $bloque => $hora)
                <tr>
                    {{-- Primera columna con el nombre y horario del bloque --}}
                    <td class="font-bold capitalize">{{ $bloque }}<br><small>{{ $hora }}</small></td>

                    {{-- Iteramos los días de la semana para cada bloque --}}
                    @foreach (['lunes','martes','miércoles','jueves','viernes','sábado'] as $dia)
                        <td class="space-y-2 text-left">
                            @php
                                // Obtenemos los horarios para ese bloque y día
                                $horariosDia = $horariosAgrupados[$bloque][$dia];
                                $primero = array_slice($horariosDia, 0, 1); // primer horario
                                $resto = array_slice($horariosDia, 1);      // los demás
                            @endphp

                            {{-- Mostrar el primer horario (si existe) --}}
                            @foreach ($primero as $hor)
                                <div class="bg-gray-100 rounded p-2">
                                    <div><strong>Materia:</strong> {{ $hor->materia->nombre }}</div>
                                    <div><strong>Docente:</strong> {{ $hor->docente->nombre }}</div>
                                    <div><strong>Programa:</strong> {{ $hor->programa->nombre }}</div>
                                    <div><strong>Sede:</strong> {{ $hor->sede->nombre }}</div>
                                    <div><strong>Grupo:</strong> {{ $hor->grupo->nombre }}</div>


                                    {{-- Botones de editar y eliminar --}}
                                    <div class="mt-1 flex gap-1">
                                        <a href="{{ route('horarios.edit', $hor->id) }}" class="btn btn-xs btn-warning">Editar</a>
                                        <form action="{{ route('horarios.destroy', $hor->id) }}" method="POST" onsubmit="return confirm('¿Deseas eliminar este horario?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-xs btn-error">Eliminar</button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach

                            {{-- Si hay más de un horario, mostrar los demás en un desplegable --}}
                            @if (count($resto) > 0)
                                <details class="mt-2">
                                    <summary class="cursor-pointer text-blue-600 text-xs">
                                        Ver más ({{ count($resto) }})
                                    </summary>
                                    @foreach ($resto as $hor)
                                        <div class="bg-gray-100 rounded p-2 mt-2">
                                            <div><strong>Materia:</strong> {{ $hor->materia->nombre }}</div>
                                            <div><strong>Docente:</strong> {{ $hor->docente->nombre }}</div>
                                            <div><strong>Programa:</strong> {{ $hor->programa->nombre }}</div>
                                            <div><strong>Sede:</strong> {{ $hor->sede->nombre }}</div>
                                            <div><strong>Grupo:</strong> {{ $hor->grupo->nombre }}</div>

                                            {{-- Botones de editar y eliminar para los otros horarios --}}
                                            <div class="mt-1 flex gap-1">
                                                <a href="{{ route('horarios.edit', $hor->id) }}" class="btn btn-xs btn-warning">Editar</a>
                                                <form action="{{ route('horarios.destroy', $hor->id) }}" method="POST" onsubmit="return confirm('¿Deseas eliminar este horario?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-xs btn-error">Eliminar</button>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                </details>
                            @endif
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- Script para ocultar automáticamente los mensajes después de 3 segundos --}}
<script>
    setTimeout(() => {
        const success = document.getElementById('success-alert');
        const error = document.getElementById('error-alert');

        if (success) {
            success.style.opacity = '0';
            setTimeout(() => success.remove(), 500); // Elimina del DOM tras desvanecer
        }

        if (error) {
            error.style.opacity = '0';
            setTimeout(() => error.remove(), 500);
        }
    }, 3000);
</script>

@endsection
