@extends('layout.admin')

@section('contenido')

<div class="container mt-4">

    <div class="card shadow-lg border-0">
        <div class="card-header bg-warning text-dark text-center">
            <h4 class="mb-0">Editar Deportista</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('deportista.update', $deportista->id) }}" method="POST" id="frm_deportista">
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

                        @foreach($disciplinas as $disciplina)
                            <option value="{{ $disciplina->id }}"
                                {{ $deportista->fk_id_disciplina == $disciplina->id ? 'selected' : '' }}>
                                {{ $disciplina->nombre_disciplina }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="nacimiento_deportista" class="form-label fw-bold">Fecha de Nacimiento</label>
                    <input 
                        type="date" 
                        name="nacimiento_deportista"
                        id="nacimiento_deportista"
                        value="{{ $deportista->nacimiento_deportista }}"
                        class="form-control"
                        >
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="estatura" class="form-label fw-bold">Estatura (m)</label>
                        <input
                            type="number"
                            name="estatura_deportista"
                            id="estatura_deportista"
                            step="0.01"
                            class="form-control"
                            value="{{ $deportista->estatura_deportista }}"
                            placeholder="Ej: 1.75">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="peso" class="form-label fw-bold">Peso (kg)</label>
                        <input
                            type="number"
                            name="peso_deportista"
                            id="peso_deportista"
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




<script>
      $.validator.addMethod("soloLetras", function(value, element) {
        return this.optional(element) || /^[a-zA-ZÁÉÍÓÚáéíóúñÑ\s]+$/.test(value);
    }, "Solo se permiten letras");
    $("#frm_deportista").validate({
        rules:{
            nombre_deportista:{
                required: true,
                minlength: 5,
                maxlength: 25,
                soloLetras: true,
            },
            fk_id_pais:{
                required: true,
            },
            fk_id_disciplina:{
                required: true,
            },
            nacimiento_deportista: {
            required: true,
            date: true,
            min: "1950-01-01",
            max: "2013-12-31"
            },
            estatura_deportista: {
                required: true,
                number: true,
                min: 1.4,
                max: 2.2
            },
            peso_deportista: {
                required: true,
                number: true,
                min: 40.0,
                max: 200.0
            }

        },
        messages:{

            nombre_deportista:{
                required: "Campo requerido",
                minlength: "Minimo 5 caracteres",
                maxlength: "Maximo 20 caracteres",
                soloLetras: "Ingrese solo letras",

            },
            fk_id_pais:{
                required: "Campo requerido",
            },
            fk_id_disciplina:{
                required: "Campo requerido",
            },
            nacimiento_deportista: {
            required: "Campo requerido",
            date: "Fecha inválida",
            min: "Fecha demasiado antigua",
            max: "Edad mínima 12 años"
            },
            estatura: {
                required: "Campo requerido",
                number: "Ingrese un número válido",
                min: "La estatura no puede ser menor a 1.40 m",
                max: "La estatura no puede superar los 2.20 m"
            },
            peso: {
                required: "Campo requerido",
                number: "Ingrese un número válido",
                min: "El peso no puede ser menor a 40 kg",
                max: "El peso no puede superar los 200 kg"
            }
        },
    });
</script>

@endsection
