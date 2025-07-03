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

        <!-- Tabla de materias -->
        <div class="md:col-span-3 bg-base-100 p-4 rounded shadow overflow-x-auto">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4 gap-2">
                <h2 class="text-xl font-bold">Listado de materias</h2>
                <a href="{{ route('materias.create') }}" class="btn btn-success w-full sm:w-auto">+ Nuevo materia</a>
            </div>

            <table class="table table-zebra w-full text-sm">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Codigo</th>
                        <th>Nombre del programa</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($materia as $mate)
                        <tr>
                            <td>{{ $mate->nombre }}</td>
                            <td>{{ $mate->codigo }}</td>
                            <td>{{ $mate->programa->nombre }}</td>
                            <td class="flex flex-col sm:flex-row gap-1">
                                <a href="{{ route('materias.edit', $mate->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                <form action="{{ route('materias.destroy', $mate->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta materia?')">
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
