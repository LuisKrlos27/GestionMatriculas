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
                <label class="label">sede</label>
                <select name="id_sede" class="select select-info w-full">
                    <option value="">-- Seleccione una sede --</option>
                    @foreach($sede as $se)
                        <option value="{{ $se->id }}" {{ $se->id == $materias_docente->id_sede ? 'selected' : '' }}>
                            {{ $se->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="label">Programa</label>
                <select name="id_programa" class="select select-info w-full">
                    <option value="">-- Seleccione un programa --</option>
                    @foreach($programa as $prog)
                        <option value="{{ $prog->id }}" {{ $prog->id == $materias_docente->id_programa ? 'selected' : '' }}>
                            {{ $prog->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="label">Semestre</label>
                <input type="number" name="semestre" value="{{ $materias_docente->semestre }}" class="input input-info w-full" required>
            </div>

            <div>
                <label class="label">Horario</label>
                <select name="id_horario" class="select select-info w-full">
                    <option value="">-- Seleccione un horario --</option>
                    @foreach($horario as $hor)
                        <option value="{{ $hor->id }}" {{ $hor->id == $materias_docente->id_horario ? 'selected' : '' }}>
                            {{ $hor->docente->nombre ?? 'Sin docente' }} - {{ $hor->materia->nombre ?? 'Sin materia' }} - {{ $hor->bloque }} - {{ $hor->dia }}
                        </option>
                    @endforeach
                </select>
            </div>


            <div class="flex justify-end gap-4 pt-4">
                <a href="{{ route('materias_docente.index') }}" class="btn btn-outline">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </div>
        </form>
    </div>



@endsection
