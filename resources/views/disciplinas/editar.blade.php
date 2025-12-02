@extends('layout.admin')

@section('contenido')

<div class="container mt-4">

    <div class="card shadow-lg border-0">
        <div class="card-header bg-warning text-dark text-center">
            <h4 class="mb-0">Editar Disciplina</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('disciplina.update', $disciplina->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="nombre_disciplina" class="form-label fw-bold">Nombre de la Disciplina</label>
                    <input
                        type="text"
                        name="nombre_disciplina"
                        id="nombre_disciplina"
                        class="form-control"
                        value="{{ $disciplina->nombre_disciplina }}"
                        placeholder="Ingrese el nombre de la disciplina"
                    >
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('disciplina.index') }}" class="btn btn-secondary">
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
