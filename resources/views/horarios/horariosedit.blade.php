@extends('layout')
@section('content')

<div class="max-w-3xl mx-auto p-6 bg-base-100 shadow rounded-lg">
    <h2 class="text-2xl font-bold mb-6 text-center">EDITAR HORARIO</h2>

    <form action="{{ route('horarios.update', $horario->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Materia -->
            <div>
                <label class="label font-semibold">Materia</label>
                <select name="id_materia" class="select select-bordered w-full" required>
                    @foreach ($materias as $materia)
                        <option value="{{ $materia->id }}" {{ $materia->id == $horario->id_materia ? 'selected' : '' }}>
                            {{ $materia->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Docente -->
            <div>
                <label class="label font-semibold">Docente</label>
                <select name="id_docente" class="select select-bordered w-full" required>
                    @foreach ($docentes as $docente)
                        <option value="{{ $docente->id }}" {{ $docente->id == $horario->id_docente ? 'selected' : '' }}>
                            {{ $docente->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Programa -->
            <div>
                <label class="label font-semibold">Programa</label>
                <select name="id_programa" class="select select-bordered w-full" required>
                    @foreach ($programas as $programa)
                        <option value="{{ $programa->id }}" {{ $programa->id == $horario->id_programa ? 'selected' : '' }}>
                            {{ $programa->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Sede -->
            <div>
                <label class="label font-semibold">Sede</label>
                <select name="id_sede" class="select select-bordered w-full" required>
                    @foreach ($sedes as $sede)
                        <option value="{{ $sede->id }}" {{ $sede->id == $horario->id_sede ? 'selected' : '' }}>
                            {{ $sede->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Día -->
            <div>
                <label class="label font-semibold">Día</label>
                <select name="dia" class="select select-bordered w-full" required>
                    @foreach (['lunes','martes','miércoles','jueves','viernes','sábado'] as $dia)
                        <option value="{{ $dia }}" {{ $dia == $horario->dia ? 'selected' : '' }}>
                            {{ ucfirst($dia) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Bloque -->
            <div>
                <label class="label font-semibold">Bloque</label>
                <select name="bloque" class="select select-bordered w-full" required>
                    <option value="mañana" {{ $horario->bloque == 'mañana' ? 'selected' : '' }}>Mañana (8:00 - 12:00)</option>
                    <option value="tarde" {{ $horario->bloque == 'tarde' ? 'selected' : '' }}>Tarde (2:00 - 6:00)</option>
                </select>
            </div>

            <!-- Fecha inicio -->
            <div>
                <label class="label font-semibold">Fecha inicio</label>
                <input type="date" name="fecha_inicio" class="input input-bordered w-full" value="{{ $horario->fecha_inicio }}" required>
            </div>

            <!-- Fecha final -->
            <div>
                <label class="label font-semibold">Fecha final</label>
                <input type="date" name="fecha_final" class="input input-bordered w-full" value="{{ $horario->fecha_final }}" required>
            </div>
        </div>

        <!-- Grupo -->
        <div>
            <label class="label">Grupo</label>
            <select name="id_grupo" class="select select-bordered w-full">
                <option value="">-- Seleccione un grupo --</option>
                @foreach($grupo as $gru)
                    <option value="{{ $gru->id }}"{{ $gru->id == $horario->id_grupo? 'selected' : '' }}>
                        {{ $gru->nombre }}
                    </option>
                @endforeach
            </select>
        </div>


        <div class="flex justify-between mt-6">
            <a href="{{ route('horarios.index') }}" class="btn btn-neutral">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>
    </form>
</div>

@endsection
