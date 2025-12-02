@extends('layout.admin')

@section('contenido')

<div class="container mt-4">

    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white text-center">
            <h4 class="mb-0">Registrar Nuevo Deportista</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('deportista.store') }}" method="POST" id="frm_deportista">
                @csrf

                <div class="mb-3">
                    <label for="nombre_deportista" class="form-label fw-bold">Nombre del Deportista</label>
                    <input 
                        type="text" 
                        name="nombre_deportista" 
                        id="nombre_deportista" 
                        class="form-control"
                        placeholder="Ingrese el nombre completo"
                        >
                </div>

                <div class="mb-3">
                    <label for="fk_id_pais" class="form-label fw-bold">País</label>
                    <select name="fk_id_pais" class="form-select">
                        <option value="">Seleccione un país</option>
                        @foreach($paises as $pais)
                            <option value="{{ $pais->id }}">{{ $pais->nombre_pais }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="fk_id_disciplina" class="form-label fw-bold">Disciplina</label>
                    <select name="fk_id_disciplina" class="form-select">
                        <option value="">Seleccione una disciplina</option>
                        @foreach($disciplinas as $disciplina)
                            <option value="{{ $disciplina->id }}">{{ $disciplina->nombre_disciplina }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="fecha_nacimiento" class="form-label fw-bold">Fecha de Nacimiento</label>
                    <input 
                        type="date" 
                        name="fecha_nacimiento" 
                        id="fecha_nacimiento" 
                        class="form-control">
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
                            placeholder="Ej: 68.5">
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('deportista.index') }}" class="btn btn-secondary">
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
            fecha_nacimiento: {
            required: true,
            date: true,
            min: "1950-01-01",
            max: "2013-12-31"
            },
            estatura: {
                required: true,
                number: true,
                min: 1.4,
                max: 2.2
            },
            peso: {
                required: true,
                number: true,
                min: 40,
                max: 200
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
            fecha_nacimiento: {
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
