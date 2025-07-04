@extends('layout')

@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-base-100 p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-6">Registrar Nuevo Estudiante</h2>

    <form action="{{ route('estudiantes.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="label">Nombre</label>
            <input type="text" name="nombre" class="input input-bordered w-full" required>
        </div>

        <div>
            <label class="label">Apellido</label>
            <input type="text" name="apellido" class="input input-bordered w-full" required>
        </div>

        <div>
            <label class="label">Documento</label>
            <input type="number" name="documento" class="input input-bordered w-full" required>
        </div>

        <div>
            <label class="label">Edad</label>
            <input type="number" name="edad" class="input input-bordered w-full">
        </div>

        <div>
            <label class="label">Dirección</label>
            <input type="text" name="direccion" class="input input-bordered w-full">
        </div>

        <div>
            <label class="label">Teléfono</label>
            <input type="number" name="telefono" class="input input-bordered w-full">
        </div>

        <div>
            <label class="label">Correo</label>
            <input type="email" name="correo" class="input input-bordered w-full">
        </div>

        <div>
            <label class="label">Fecha de Nacimiento</label>
            <input type="date" name="fecha_nacimiento" class="input input-bordered w-full">
        </div>

        <div class="flex justify-end gap-4 pt-4">
            <a href="{{ route('estudiantes.index') }}" class="btn btn-outline">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>
@endsection
