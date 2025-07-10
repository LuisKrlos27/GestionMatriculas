@extends('layout')
@section('content')
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 px-4">

        <!-- Mensajes de éxito y error con desvanecimiento -->
        @if (session('success'))
            <div id="success-alert" class="alert alert-success shadow-lg mb-4 md:col-span-4 transition-opacity duration-500">
                <div>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div id="error-alert" class="alert alert-error shadow-lg mb-4 md:col-span-4 transition-opacity duration-500">
                <div>
                    <span>{{ session('error') }}</span>
                </div>
            </div>
        @endif
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

        <!-- Tabla de estudiantes -->
        <div class="md:col-span-3 bg-base-100 p-4 rounded shadow overflow-x-auto">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4 gap-2">
                <h2 class="text-xl font-bold">LISTADO DE SEDES</h2>
                <a href="{{ route('sedes.create') }}" class="btn btn-success w-full sm:w-auto">+ Nueva sede</a>
            </div>

            <table class="table table-zebra w-full text-sm">
                <thead>
                    <tr>
                        <th>Nombre de la sede</th>
                        <th>Ciudad</th>
                        <th>Codigo postal</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sede as $se)
                        <tr>
                            <td>{{ $se->nombre }}</td>
                            <td>{{ $se->ciudad }}</td>
                            <td>{{ $se->codigo_postal }}</td>
                            <td>{{ $se->direccion }}</td>
                            <td>{{ $se->telefono }}</td>
                            <td class="flex flex-col sm:flex-row gap-1">
                                <a href="{{ route('sedes.edit', $se->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                <form action="{{ route('sedes.destroy', $se->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta sede?')">
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

        <!-- Script para ocultar alertas después de 3 segundos -->
    <script>
        setTimeout(() => {
            const success = document.getElementById('success-alert');
            const error = document.getElementById('error-alert');

            if (success) {
                success.style.opacity = '0';
                setTimeout(() => success.remove(), 500); // Quita el elemento del DOM tras desvanecer
            }

            if (error) {
                error.style.opacity = '0';
                setTimeout(() => error.remove(), 500);
            }
        }, 3000); // 3 segundos
    </script>



@endsection
