@extends('layout')
@section('content')
    <div class="max-w-2xl mx-auto mt-10 bg-base-100 p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-6">NUEVA MATRICULA</h2>

        <form action="{{ route('matriculas.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="id_estudiante" class="label">Estudiante</label>
                <select name="id_estudiante" id="id_estudiante" class="select select-bordered w-full" required>
                    <option value="">-- Seleccione un estudiante --</option>
                    @foreach($estudiante as $estu)
                        <option value="{{ $estu->id }}" {{ old('id_estudiante') == $estu->id ? 'selected' : '' }}>
                            {{ $estu->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('id_estudiante')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="id_sede" class="label">Sede</label>
                <select name="id_sede" id="id_sede" class="select select-bordered w-full" required>
                    <option value="">-- Seleccione una sede --</option>
                    @foreach($sede as $sed)
                        <option value="{{ $sed->id }}" {{ old('id_sede') == $sed->id ? 'selected' : '' }}>
                            {{ $sed->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('id_sede')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="id_programa" class="label">Programa</label>
                <select name="id_programa" id="id_programa" class="select select-bordered w-full" required>
                    <option value="">-- Seleccione un programa --</option>
                    @foreach($programa as $pro)
                        <option value="{{ $pro->id }}" {{ old('id_programa') == $pro->id ? 'selected' : '' }}>
                            {{ $pro->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('id_programa')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="id_materia" class="label">Materia</label>
                <select name="id_materia" id="id_materia" class="select select-bordered w-full" required>
                    <option value="">-- Seleccione una materia --</option>
                    @foreach($materia as $mat)
                        <option value="{{ $mat->id }}" {{ old('id_materia') == $mat->id ? 'selected' : '' }}>
                            {{ $mat->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('id_materia')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="id_grupo" class="label">Grupo</label>
                <select name="id_grupo" id="id_grupo" class="select select-bordered w-full" required>
                    <option value="">-- Seleccione un grupo --</option>
                    @foreach($grupo as $gru)
                        <option value="{{ $gru->id }}" {{ old('id_grupo') == $gru->id ? 'selected' : '' }}>
                            {{ $gru->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('id_grupo')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="fecha_matricula" class="label">Fecha de matrícula</label>
                <input type="date" name="fecha_matricula" id="fecha_matricula" class="input input-bordered w-full" value="{{ old('fecha_matricula') }}" required>
                @error('fecha_matricula')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="estado" class="label">Estado</label>
                <select name="estado" id="estado" class="select select-bordered w-full" required>
                    <option value="0" {{ old('estado') === '0' ? 'selected' : '' }}>No Activo</option>
                    <option value="1" {{ old('estado') === '1' ? 'selected' : '' }}>Activo</option>
                </select>
                @error('estado')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end gap-4 pt-4">
                <a href="{{ route('matriculas.index') }}" class="btn btn-outline">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
@endsection
