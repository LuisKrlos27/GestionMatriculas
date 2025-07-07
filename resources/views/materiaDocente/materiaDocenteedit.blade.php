@extends('layout')
@section('content')

    <div class="max-w-2xl mx-auto mt-10 bg-base-100 p-6 rounded shadow">
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
        <h2 class="text-2xl font-bold mb-6">Editar</h2>

        <form action="{{ route('materias_docente.update', $materias_docente) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="label">Docente</label>
                <select name="id_docente" class="select select-info w-full">
                    <option value="">-- Seleccione un docente --</option>
                    @foreach($docente as $doc)
                        <option value="{{ $doc->id }}" {{ $doc->id == $materias_docente->id_docente ? 'selected' : '' }}>
                            {{ $doc->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="label">Materia</label>
                <select name="id_materia" class="select select-info w-full">
                    <option value="">-- Seleccione una materia --</option>
                    @foreach($materia as $mat)
                        <option value="{{ $mat->id }}" {{ $mat->id == $materias_docente->id_materia ? 'selected' : '' }}>
                            {{ $mat->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="label">Semestre</label>
                <input type="number" name="semestre" value="{{ $materias_docente->semestre }}" class="input input-info w-full" required>
            </div>

            <div class="flex justify-end gap-4 pt-4">
                <a href="{{ route('materias_docente.index') }}" class="btn btn-outline">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </div>
        </form>
    </div>



@endsection
