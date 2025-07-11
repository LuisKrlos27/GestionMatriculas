@extends('layout')
@section('content')

<div class="max-w-2xl mx-auto mt-10 bg-base-100 p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-6">EDITAR MATRICULAS</h2>

        <form action="{{ route('matriculas.update', $matricula->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="label">Estudiante</label>
                <select name="id_estudiante" class="select select-bordered w-full">
                    <option value="">-- Seleccione un estudiante --</option>
                    @foreach($estudiante as $est)
                        <option value="{{ $est->id }}" {{ $est->id == $matricula->id_estudiante ? 'selected' : '' }}>
                            {{ $est->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="label">Sede</label>
                <select name="id_sede" class="select select-bordered w-full">
                    <option value="">-- Seleccione una sede --</option>
                    @foreach($sede as $sed)
                        <option value="{{ $sed->id }}" {{ $sed->id == $matricula->id_sede ? 'selected' : '' }}>
                            {{ $sed->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="label">Programa</label>
                <select name="id_programa" class="select select-bordered w-full">
                    <option value="">-- Seleccione un programa --</option>
                    @foreach($programa as $prog)
                        <option value="{{ $prog->id }}" {{ $prog->id == $matricula->id_programa ? 'selected' : '' }}>
                            {{ $prog->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="label">Materia</label>
                <select name="id_materia" class="select select-bordered w-full">
                    <option value="">-- Seleccione una materia --</option>
                    @foreach($materia as $mat)
                        <option value="{{ $mat->id }}" {{ $mat->id == $matricula->id_materia ? 'selected' : '' }}>
                            {{ $mat->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="label">Grupo</label>
                <select name="id_grupo" class="select select-bordered w-full">
                    <option value="">-- Seleccione un grupo --</option>
                    @foreach($grupo as $gru)
                        <option value="{{ $gru->id }}" {{ $gru->id == $matricula->id_grupo ? 'selected' : '' }}>
                            {{ $gru->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="fecha_matricula" class="label">Fecha de Matrícula</label>
                <input type="date" name="fecha_matricula" id="fecha_matricula" class="input input-bordered w-full"
                    value="{{ $matricula->fecha_matricula }}" required>
            </div>


            <div>
                <label for="estado" class="label">Estado</label>
                <select name="estado" id="estado" class="select select-bordered w-full" required>
                    <option value="1" {{ $matricula->estado == 1 ? 'selected' : '' }}>Activo</option>
                    <option value="0" {{ $matricula->estado == 0 ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>


            <div class="flex justify-end gap-4 pt-4">
                <a href="{{ route('matriculas.index') }}" class="btn btn-outline">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </div>
        </form>
    </div>

@endsection
