@extends('layout')
@section('content')

    <div class="max-w-2xl mx-auto mt-10 bg-base-100 p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-6">Nuevo registro</h2>

        <form action="{{ route('materias_docente.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="label">Docente</label>
                <select name="id_docente" class="select select-bordered w-full">
                    <option value="">-- Seleccione un docente --</option>
                    @foreach($docente as $doc)
                        <option value="{{ $doc->id }}">{{ $doc->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="label">Materia</label>
                <select name="id_materia" class="select select-bordered w-full">
                    <option value="">-- Seleccione una materia --</option>
                    @foreach($materia as $mat)
                        <option value="{{ $mat->id }}">{{ $mat->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="label">Semestre</label>
                <input type="number" name="semestre" class="input input-bordered w-full" required>
            </div>

            <div class="flex justify-end gap-4 pt-4">
                <a href="{{ route('materias_docente.index') }}" class="btn btn-outline">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>

@endsection
