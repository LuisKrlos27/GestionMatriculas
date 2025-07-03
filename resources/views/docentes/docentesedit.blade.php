@extends('layout')

@section('content')

    <div class="max-w-2xl mx-auto mt-10 bg-base-100 p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-6">Editar docente</h2>

        <form action="{{ route('docentes.update', $docente->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="label">Nombre</label>
                <input type="text" name="nombre" value="{{ $docente->nombre }}" class="input input-bordered w-full" required>
            </div>

            <div>
                <label class="label">Correo</label>
                <input type="email" name="correo" value="{{ $docente->correo }}" class="input input-bordered w-full">
            </div>

            <div>
                <label class="label">Titulo</label>
                <input type="string" name="titulo" value="{{ $docente->titulo }}" class="input input-bordered w-full">
            </div>

            <div class="flex justify-end gap-4 pt-4">
                <a href="{{ route('estudiantes.index') }}" class="btn btn-outline">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </div>
        </form>
    </div>

@endsection
