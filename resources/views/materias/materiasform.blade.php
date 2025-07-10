@extends('layout')
@section('content')
    <div class="max-w-2xl mx-auto mt-10 bg-base-100 p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-6">REGISTRAR NUEVA MATERIA</h2>

        <form action="{{ route('materias.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="label">Nombre</label>
                <input type="text" name="nombre" class="input input-bordered w-full">
            </div>

            <div>
                <label class="label">Codigo</label>
                <input type="number" name="codigo" class="input input-bordered w-full">
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
                <label class="label">Código del programa</label>
                <input type="text" name="id_cod_prog" id="codigo-programa" class="input input-bordered w-full" readonly>
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
                <a href="{{ route('materias.index') }}" class="btn btn-outline">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const programaSelect = document.getElementById('programa-select');
            const codigoInput = document.getElementById('codigo-programa');

            programaSelect.addEventListener('change', function () {
                const selectedOption = this.options[this.selectedIndex];
                const codigo = selectedOption.getAttribute('data-codigo');
                codigoInput.value = codigo ?? '';
            });
        });
    </script>
@endsection
