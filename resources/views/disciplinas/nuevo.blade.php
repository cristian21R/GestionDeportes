@extends('layout.admin')

@section('contenido')

<div class="container mt-4">

    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white text-center">
            <h4 class="mb-0">Registrar Nueva Disciplina</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('disciplina.store') }}" method="POST" id="frm_disciplina">
                @csrf

                <div class="form-group mb-3">
                    <label for="nombre_disciplina" class="form-label fw-bold">Nombre de la Disciplina</label>
                    <input
                        type="text"
                        name="nombre_disciplina"
                        id="nombre_disciplina"
                        class="form-control"
                        placeholder="Ingrese el nombre de la disciplina"
                    >
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('disciplina.index') }}" class="btn btn-secondary">
                        Cancelar
                    </a>

                    <button type="submit" class="btn btn-success">
                        Guardar
                    </button>
                </div>
            </form>

        </div>
    </div>

</div>

@endsection
