@extends('layout.admin')

@section('contenido')

<div class="container mt-4">

    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white text-center">
            <h4 class="mb-0">Registrar Nuevo Usuario</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('user.store') }}" method="POST" id="frm_usuario">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Nombre</label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        class="form-control"
                        placeholder="Ingrese el nombre completo"
                        >
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Correo Electrónico</label>
                    <input 
                        type="email" 
                        name="email" 
                        id="email" 
                        class="form-control"
                        placeholder="Ingrese el correo electrónico"
                        >
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label fw-bold">Contraseña</label>
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        class="form-control"
                        placeholder="Ingrese la contraseña"
                        >
                </div>

                

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('user.create') }}" class="btn btn-secondary">
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
    $("#frm_usuario").validate({
        rules:{
            name:{
                required: true,
                minlength: 5,
                maxlength: 25
            },
            email:{
                required: true,
                email: true
            },
            password:{
                required: true,
                minlength: 6
            },
            password_confirmation:{
                required: true,
                equalTo: "#password"
            },
            role:{
                required: true
            }
        },
        messages:{
            name:{
                required: "Campo requerido",
                minlength: "Mínimo 5 caracteres",
                maxlength: "Máximo 25 caracteres"
            },
            email:{
                required: "Campo requerido",
                email: "Ingrese un correo válido"
            },
            password:{
                required: "Campo requerido",
                minlength: "La contraseña debe tener al menos 6 caracteres"
            },
            password_confirmation:{
                required: "Campo requerido",
                equalTo: "Las contraseñas no coinciden"
            },
            role:{
                required: "Seleccione un rol"
            }
        }
    });
</script>

@endsection
