@extends('layout')

@section('content')

<div class="max-w-2xl mx-auto mt-10 bg-base-100 p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-6">Registrar Nuevo Docente</h2>

    <form action="{{ route('docentes.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="label">Nombre</label>
            <input type="text" name="nombre" class="input input-bordered w-full" required>
        </div>

        <div>
            <label class="label">Correo</label>
            <input type="text" name="correo" class="input input-bordered w-full" required>
        </div>

        <div>
            <label class="label">Titulo</label>
            <input type="text" name="titulo" class="input input-bordered w-full" required>
        </div>

        <div class="flex justify-end gap-4 pt-4">
            <a href="{{ route('docentes.index') }}" class="btn btn-outline">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>

@endsection
