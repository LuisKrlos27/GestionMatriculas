@extends('layout')
@section('content')

<div class="max-w-3xl mx-auto p-6 bg-base-100 shadow rounded-lg">
    <h2 class="text-2xl font-bold mb-6 text-center">AGREGAR NUEVO HORARIO </h2>

    <form action="{{ route('horarios.store') }}" method="POST" class="space-y-4">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Selección de docente -->
            <div>
                <label class="label">Docente</label>
                <select name="id_docente" class="select select-bordered w-full" required>
                    <option value="">Seleccione un docente</option>
                    @foreach($docentes as $docente)
                        <option value="{{ $docente->id }}">{{ $docente->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Selección de materia -->
            <div>
                <label class="label">Materia</label>
                <select name="id_materia" class="select select-bordered w-full" required>
                    <option value="">Seleccione una materia</option>
                    @foreach($materias as $materia)
                        <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Selección de programa -->
            <div>
                <label class="label">Programa</label>
                <select name="id_programa" class="select select-bordered w-full" required>
                    <option value="">Seleccione un programa</option>
                    @foreach($programas as $programa)
                        <option value="{{ $programa->id }}">{{ $programa->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Selección de sede -->
            <div>
                <label class="label">Sede</label>
                <select name="id_sede" class="select select-bordered w-full" required>
                    <option value="">Seleccione una sede</option>
                    @foreach($sedes as $sede)
                        <option value="{{ $sede->id }}">{{ $sede->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Día (precargado si viene desde el botón) -->
            <div>
                <label class="label">Día</label>
                <select name="dia" class="select select-bordered w-full" required>
                    @foreach(['lunes','martes','miércoles','jueves','viernes','sábado'] as $d)
                        <option value="{{ $d }}" {{ request('dia') == $d ? 'selected' : '' }}>
                            {{ ucfirst($d) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Bloque (precargado si viene desde el botón) -->
            <div>
                <label class="label">Bloque</label>
                <select name="bloque" class="select select-bordered w-full" required>
                    <option value="mañana" {{ request('bloque') == 'mañana' ? 'selected' : '' }}>Mañana</option>
                    <option value="tarde" {{ request('bloque') == 'tarde' ? 'selected' : '' }}>Tarde</option>
                </select>
            </div>
        </div>

        <!-- Fechas -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="label">Fecha Inicio</label>
                <input type="date" name="fecha_inicio" class="input input-bordered w-full">
            </div>
            <div>
                <label class="label">Fecha Final</label>
                <input type="date" name="fecha_final" class="input input-bordered w-full">
            </div>
        </div>

        <!-- Grupos -->
        <div>
            <label class="label">Grupo</label>
            <select name="id_grupo" class="select select-bordered w-full">
                <option value="">-- Seleccione un grupo --</option>
                @foreach($grupo as $gru)
                    <option value="{{ $gru->id }}">{{ $gru->nombre }}</option>
                @endforeach
            </select>
        </div>


        <!-- Botones -->
        <div class="flex justify-end gap-4 mt-6">
            <a href="{{ route('horarios.index') }}" class="btn btn-outline">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>

@endsection
