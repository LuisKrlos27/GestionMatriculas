@extends('layout')
@section('content')

<!-- Mensajes de éxito y error con desvanecimiento -->
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


<div class="max-w-7xl mx-auto p-4 bg-base-100 shadow rounded-lg">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-center w-full">HORARIO ACADEMICO </h2>
        <a href="{{ route('horarios.create') }}" class="btn btn-active btn-accent ml-auto">
            Agregar horario
        </a>
    </div>

    <table class="table table-zebra text-sm text-center w-full">
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
            @foreach (['mañana' => '8:00 - 12:00', 'tarde' => '2:00 - 6:00'] as $bloque => $hora)
                <tr>
                    <td class="font-bold capitalize">{{ $bloque }}<br><small>{{ $hora }}</small></td>

                    @foreach (['lunes','martes','miércoles','jueves','viernes','sábado'] as $dia)
                        <td class="space-y-4">
                            @forelse ($horariosAgrupados[$bloque][$dia] as $hor)
                                <div class="bg-gray-50 border border-gray-300 rounded-lg shadow-sm p-3 text-left space-y-1">
                                    <p><span class="font-semibold text-gray-700">Materia:</span> {{ $hor->materia->nombre }}</p>
                                    <p><span class="font-semibold text-gray-700">Docente:</span> {{ $hor->docente->nombre }}</p>
                                    <p><span class="font-semibold text-gray-700">Programa:</span> {{ $hor->programa->nombre }}</p>
                                    <p><span class="font-semibold text-gray-700">Sede:</span> {{ $hor->sede->nombre }}</p>

                                    @if($hor->fecha_inicio && $hor->fecha_final)
                                        <p class="text-xs text-gray-500 italic">
                                            {{ \Carbon\Carbon::parse($hor->fecha_inicio)->format('d/m/Y') }} -
                                            {{ \Carbon\Carbon::parse($hor->fecha_final)->format('d/m/Y') }}
                                        </p>
                                    @endif

                                    <div class="flex justify-end gap-2 pt-2">
                                        <a href="{{ route('horarios.edit', $hor->id) }}"
                                        class="btn btn-xs btn-outline btn-warning">Editar</a>

                                        <form action="{{ route('horarios.destroy', $hor->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('¿Estás seguro de eliminar este horario?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-xs btn-outline btn-error">Eliminar</button>
                                        </form>
                                    </div>
                                </div>
                            @empty
                                <div class="text-gray-400 text-xs">-</div>
                            @endforelse
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- Script para ocultar alertas después de 3 segundos -->
    <script>
        setTimeout(() => {
            const success = document.getElementById('success-alert');
            const error = document.getElementById('error-alert');

            if (success) {
                success.style.opacity = '0';
                setTimeout(() => success.remove(), 500); // Quita el elemento del DOM tras desvanecer
            }

            if (error) {
                error.style.opacity = '0';
                setTimeout(() => error.remove(), 500);
            }
        }, 3000); // 3 segundos
    </script>

@endsection
