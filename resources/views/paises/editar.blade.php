@extends('layout.admin')

@section('contenido')

<div class="container mt-4">

    <div class="card shadow-lg border-0">
        <div class="card-header bg-warning text-dark text-center">
            <h4 class="mb-0">Editar País</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('pais.update', $pais->id) }}" method="POST" id="frm_pais">
                @csrf
                @method('PUT')

                <input type="hidden" name="id_pais" id="id_pais" value="{{ $pais->id }}">

                <div class="form-group mb-3">
                    <label for="nombre_pais" class="form-label fw-bold">Nombre</label>
                    <input
                        type="text"
                        name="nombre_pais"
                        id="nombre_pais"
                        value="{{ $pais->nombre_pais }}"
                        class="form-control"
                        placeholder="Ingrese el nombre del país"
                    >
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('pais.index') }}" class="btn btn-secondary">
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
    $("#frm_pais").validate({
        rules:{
            nombre_pais:{
                required: true,
                minlength: 5,
                maxlength: 25,
                soloLetras: true,
            }

        },
        messages:{

            nombre_pais:{
                required: "Campo requerido",
                minlength: "Minimo 5 caracteres",
                maxlength: "Maximo 20 caracteres",
                soloLetras: "Ingrese solo letras",

            }
        },
    });
</script>
@endsection
