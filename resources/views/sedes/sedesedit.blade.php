@extends('layout')
@section('content')
    <div class="max-w-2xl mx-auto mt-10 bg-base-100 p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-6">Editar sede</h2>

        <form action="{{ route('sedes.update', $sede) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="label">Nombre de la sede</label>
                <input type="text" name="nombre" value="{{ $sede->nombre }}" class="input input-bordered w-full" required>
            </div>

            <div>
                <label class="label">Ciudad</label>
                <input type="text" name="ciudad" value="{{ $sede->ciudad }}" class="input input-bordered w-full" required>
            </div>

            <div>
                <label class="label">Codigo postal</label>
                <input type="number" name="codigo_postal" value="{{ $sede->codigo_postal }}" class="input input-bordered w-full" required>
            </div>

            <div>
                <label class="label">Direccion</label>
                <input type="text" name="direccion" value="{{ $sede->direccion }}" class="input input-bordered w-full" required>
            </div>

            <div>
                <label class="label">Telefono</label>
                <input type="number" name="telefono" value="{{ $sede->telefono }}" class="input input-bordered w-full" required>
            </div>

            <div class="flex justify-end gap-4 pt-4">
                <a href="{{ route('sedes.index') }}" class="btn btn-outline">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </div>
        </form>
    </div>
@endsection
