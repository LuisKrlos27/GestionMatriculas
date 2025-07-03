@extends('layout')
@section('content')
    <div class="max-w-2xl mx-auto mt-10 bg-base-100 p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-6">Registrar nueva materia</h2>

        <form action="{{ route('materias.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="label">Nombre</label>
                <input type="text" name="nombre" class="input input-bordered w-full" nullable>
            </div>

            <div>
                <label class="label">Codigo</label>
                <input type="number" name="codigo" class="input input-bordered w-full" nullable>
            </div>

            <div>
                <label class="label">Programa</label>
                <select name="id_programa" class="select select-bordered w-full">
                    <option value="">-- Seleccione un programa --</option>
                    @foreach($programa as $prog)
                        <option value="{{ $prog->id }}">{{ $prog->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-end gap-4 pt-4">
                <a href="{{ route('materias.index') }}" class="btn btn-outline">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
@endsection
