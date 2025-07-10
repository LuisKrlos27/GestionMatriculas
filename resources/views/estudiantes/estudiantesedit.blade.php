@extends('layout')

@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-base-100 p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-6">EDITAR ESTUDIANTE</h2>

    <form action="{{ route('estudiantes.update', $estudiante->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="label">Nombre</label>
            <input type="text" name="nombre" value="{{ $estudiante->nombre }}" class="input input-bordered w-full" required>
        </div>

        <div>
            <label class="label">Apellido</label>
            <input type="text" name="apellido" value="{{ $estudiante->apellido }}" class="input input-bordered w-full" required>
        </div>

        <div>
            <label class="label">Documento</label>
            <input type="number" name="documento" value="{{ $estudiante->documento }}" class="input input-bordered w-full" required>
        </div>

        <div>
            <label class="label">Edad</label>
            <input type="number" name="edad" value="{{ $estudiante->edad }}" class="input input-bordered w-full">
        </div>

        <div>
            <label class="label">Dirección</label>
            <input type="text" name="direccion" value="{{ $estudiante->direccion }}" class="input input-bordered w-full">
        </div>

        <div>
            <label class="label">Teléfono</label>
            <input type="text" name="telefono" value="{{ $estudiante->telefono }}" class="input input-bordered w-full">
        </div>

        <div>
            <label class="label">Correo</label>
            <input type="email" name="correo" value="{{ $estudiante->correo }}" class="input input-bordered w-full">
        </div>

        <div>
            <label class="label">Sede</label>
            <select name="id_sede" class="select select-bordered w-full">
                <option value="">-- Seleccione una sede --</option>
                @foreach($sede as $se)
                    <option value="{{ $se->id }}" {{ $se->id == $estudiante->id_sede ? 'selected' : '' }}>
                        {{ $se->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="label">Programa</label>
            <select name="id_programa" class="select select-bordered w-full">
                <option value="">-- Seleccione un programa --</option>
                @foreach($programa as $prog)
                    <option value="{{ $prog->id }}" {{ $prog->id == $estudiante->id_programa ? 'selected' : '' }}>
                        {{ $prog->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="label">Fecha de Nacimiento</label>
            <input type="date" name="fecha_nacimiento" value="{{ $estudiante->fecha_nacimiento }}" class="input input-bordered w-full">
        </div>

        <div class="flex justify-end gap-4 pt-4">
            <a href="{{ route('estudiantes.index') }}" class="btn btn-outline">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>
    </form>
</div>
@endsection
