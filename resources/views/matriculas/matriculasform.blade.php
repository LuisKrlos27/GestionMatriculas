@extends('layout')
@section('content')
    <div class="max-w-2xl mx-auto mt-10 bg-base-100 p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-6">NUEVA MATRICULA</h2>

        <form action="{{ route('matriculas.store') }}" method="POST" class="space-y-4">
            @csrf

            {{-- Estudiante --}}
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

            {{-- Materia --}}
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

            {{-- Fecha de matrícula --}}
            <div>
                <label for="fecha_matricula" class="label">Fecha de matrícula</label>
                <input type="date" name="fecha_matricula" id="fecha_matricula" class="input input-bordered w-full" value="{{ old('fecha_matricula') }}" required>
                @error('fecha_matricula')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Estado --}}
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

            {{-- Botones --}}
            <div class="flex justify-end gap-4 pt-4">
                <a href="{{ route('matriculas.index') }}" class="btn btn-outline">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
@endsection
