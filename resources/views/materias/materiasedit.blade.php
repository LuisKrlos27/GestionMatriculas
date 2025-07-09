@extends('layout')
@section('content')

<div class="max-w-2xl mx-auto mt-10 bg-base-100 p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-6">Editar materias</h2>

        <form action="{{ route('materias.update', $materia->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="label">Nombre</label>
                <input type="text" name="nombre" value="{{ $materia->nombre }}" class="input input-bordered w-full" required>
            </div>

            <div>
                <label class="label">Codigo</label>
                <input type="number" name="codigo" value="{{ $materia->codigo }}" class="input input-bordered w-full" required>
            </div>

            <div>
                <label class="label">Programa</label>
                <select name="id_programa" class="select select-bordered w-full">
                    <option value="">-- Seleccione un programa --</option>
                    @foreach($programa as $prog)
                        <option value="{{ $prog->id }}" {{ $prog->id == $materia->id_programa ? 'selected' : '' }}>
                            {{ $prog->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="label">Codigo del programa</label>
                <input type="text" name="id_prog_cod" value="{{ $materia->id_cod_prog }}" class="input input-bordered w-full" required>
            </div>

            <div>
                <label class="label">sede</label>
                <select name="id_programa" class="select select-bordered w-full">
                    <option value="">-- Seleccione una sede --</option>
                    @foreach($sede as $se)
                        <option value="{{ $se->id }}" {{ $se->id == $materia->id_sede ? 'selected' : '' }}>
                            {{ $se->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="flex justify-end gap-4 pt-4">
                <a href="{{ route('materias.index') }}" class="btn btn-outline">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </div>
        </form>
    </div>

@endsection
