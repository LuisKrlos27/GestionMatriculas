@extends('layout')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 px-4">

    <!-- Filtros o menú lateral -->
    <div class="md:col-span-1 bg-base-200 rounded p-4">
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

    <!-- Tabla de Docentes -->
    <div class="md:col-span-3 bg-base-100 p-4 rounded shadow overflow-x-auto">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4 gap-2">
            <h2 class="text-xl font-bold">Listado de Docentes</h2>
            <a href="{{ route('docentes.create') }}" class="btn btn-success w-full sm:w-auto">+ Nuevo Docente</a>
        </div>

        <table class="table table-zebra w-full text-sm">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Titulo</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($docente as $doce)
                    <tr>
                        <td>{{ $doce->nombre }}</td>
                        <td>{{ $doce->correo }}</td>
                        <td>{{ $doce->titulo }}</td>
                        <td class="flex flex-col sm:flex-row gap-1">
                            <a href="{{ route('docentes.edit', $doce->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('docentes.destroy', $doce->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este docente?')">
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
