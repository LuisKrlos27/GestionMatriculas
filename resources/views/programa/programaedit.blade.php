@extends('layout')

@section('content')
    <div class="max-w-2xl mx-auto mt-10 bg-base-100 p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-6">EDITAR PROGRAMA</h2>

        <form action="{{ route('programas.update', $programa->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="label">Nombre</label>
                <input type="text" name="nombre" value="{{ $programa->nombre }}" class="input input-bordered w-full" required>
            </div>

            <div>
                <label class="label">Codigo</label>
                <input type="number" name="codigo" value="{{ $programa->codigo }}" class="input input-bordered w-full" required>
            </div>

            <div>
                <label class="label">Sede</label>
                <select name="id_sede" class="select select-bordered w-full">
                    <option value="">-- Seleccione una sede --</option>
                    @foreach($sede as $se)
                        <option value="{{ $se->id }}" {{ $se->id == $programa->id_sede ? 'selected' : '' }}>
                            {{ $se->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="flex justify-end gap-4 pt-4">
                <a href="{{ route('programas.index') }}" class="btn btn-outline">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </div>
        </form>
    </div>
@endsection
