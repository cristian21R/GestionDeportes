@extends('layout.admin')

@section('contenido')

<div class="container mt-4">

    <div class="card shadow-lg border-0">
        <div class="card-header bg-warning text-dark text-center">
            <h4 class="mb-0">Editar Deportista</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('deportista.update', $deportista->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nombre_deportista" class="form-label fw-bold">Nombre del Deportista</label>
                    <input 
                        type="text"
                        name="nombre_deportista"
                        id="nombre_deportista"
                        class="form-control"
                        value="{{ $deportista->nombre_deportista }}"
                        placeholder="Ingrese el nombre completo"
                        >
                </div>

                <div class="mb-3">
                    <label for="fk_id_pais" class="form-label fw-bold">País</label>
                    <select name="fk_id_pais" class="form-select">
                        <option value="">Seleccione un país</option>

                        @foreach($paises as $pais)
                            <option value="{{ $pais->id }}"
                                {{ $deportista->fk_id_pais == $pais->id ? 'selected' : '' }}>
                                {{ $pais->nombre_pais }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="fk_id_disciplina" class="form-label fw-bold">Disciplina</label>
                    <select name="fk_id_disciplina" class="form-select">
                        <option value="">Seleccione una disciplina</option>

                        @foreach($disciplinas as $disciplina)
                            <option value="{{ $disciplina->id }}"
                                {{ $deportista->fk_id_disciplina == $disciplina->id ? 'selected' : '' }}>
                                {{ $disciplina->nombre_disciplina }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="fecha_nacimiento" class="form-label fw-bold">Fecha de Nacimiento</label>
                    <input 
                        type="date" 
                        name="fecha_nacimiento"
                        id="fecha_nacimiento"
                        value="{{ $deportista->nacimiento_deportista }}"
                        class="form-control"
                        >
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="estatura" class="form-label fw-bold">Estatura (m)</label>
                        <input
                            type="number"
                            name="estatura"
                            id="estatura"
                            step="0.01"
                            class="form-control"
                            value="{{ $deportista->estatura_deportista }}"
                            placeholder="Ej: 1.75">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="peso" class="form-label fw-bold">Peso (kg)</label>
                        <input
                            type="number"
                            name="peso"
                            id="peso"
                            step="0.1"
                            class="form-control"
                            value="{{ $deportista->peso_deportista }}"
                            placeholder="Ej: 68.5">
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('deportista.index') }}" class="btn btn-secondary">
                        Cancelar
                    </a>

                    <button type="submit" class="btn btn-warning text-dark">
                        Actualizar
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection
