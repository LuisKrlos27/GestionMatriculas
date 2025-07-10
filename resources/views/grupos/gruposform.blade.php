
@extends('layout')

@section('content')

    <div class="max-w-2xl mx-auto mt-10 bg-base-100 p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-6">REGISTRAR NUEVO GRUPO</h2>

        <form action="{{ route('grupos.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="label">Nombre</label>
                <input type="text" name="nombre" class="input input-bordered w-full" required>
            </div>

            <div>
                <label class="label">Programa</label>
                <select name="id_programa" id="programa-select" class="select select-bordered w-full">
                    <option value="">-- Seleccione un programa --</option>
                    @foreach($programa as $prog)
                        <option value="{{ $prog->id }}" data-codigo="{{ $prog->codigo }}">
                            {{ $prog->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="label">Sede</label>
                <select name="id_sede" class="select select-bordered w-full">
                    <option value="">-- Seleccione una Sede --</option>
                    @foreach($sede as $se)
                        <option value="{{ $se->id }}">{{ $se->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-end gap-4 pt-4">
                <a href="{{ route('grupos.index') }}" class="btn btn-outline">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>

@endsection
