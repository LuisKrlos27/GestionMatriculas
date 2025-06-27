@extends('layout')

@section('content')
<div class="grid grid-cols-4 gap-4">

    <!-- Filtros o menú lateral -->
    <div class="col-span-1 bg-base-200 rounded p-4">
        <h2 class="text-lg font-bold mb-4">Filtros</h2>
        <form>
            <label class="label">Nombre</label>
            <input type="text" placeholder="Buscar..." class="input input-bordered w-full mb-3">

            <label class="label">Edad</label>
            <select class="select select-bordered w-full mb-3">
                <option value="">Todas</option>
                <option value="18">18+</option>
                <option value="20">20+</option>
            </select>

            <button class="btn btn-primary w-full">Filtrar</button>
        </form>
    </div>

    <!-- Tabla de estudiantes -->
    <div class="col-span-3 bg-base-100 p-4 rounded shadow">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold">Listado de Estudiantes</h2>
            <a href="{{ route('estudiantes.create') }}" class="btn btn-success">
                + Nuevo Estudiante
            </a>
        </div>

        <table class="table table-zebra w-full">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Edad</th>
                    <th>Correo</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
    @foreach ($estudiantes as $est)
        <tr>
            <td>{{ $est->nombre }}</td>
            <td>{{ $est->apellido }}</td>
            <td>{{ $est->edad }}</td>
            <td>{{ $est->correo }}</td>
            <td class="flex gap-2">
                <!-- Botón Editar -->
                <a href="{{ route('estudiantes.edit', $est->id) }}" class="btn btn-sm btn-warning">Editar</a>

                <!-- Botón Eliminar -->
                <form action="{{ route('estudiantes.destroy', $est->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este estudiante?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-error">Eliminar</button>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>

        </table>
    </div>

</div>
@endsection
