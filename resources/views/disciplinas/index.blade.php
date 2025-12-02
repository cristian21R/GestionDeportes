@extends('layout.admin')
@section('contenido')
 <script>

        function confirmarEliminacion(id)
        {
            Swal.fire({
            title: "¿Esta seguro de eliminar?",
            text: "No se podrá recuperar el registro!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si,eliminar!",
            cancelButtonText: "Cancelar"
            }).then((result) => {
            if (result.isConfirmed) {
               document.getElementById('form-eliminar-' + id).submit();
            }
            });
        }

    </script>

<a href="{{route ('disciplina.create')}}">Nuevo Registro</a>
<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre Disciplina</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($disciplinas as $disTmp)
        <tr>
            <td>{{$disTmp->id}}</td>
            <td>{{$disTmp->nombre_disciplina}}</td>
            <td>

                <a href="{{route('disciplina.edit',$disTmp->id)}}">
                    Editar
                </a>

                <form id="form-eliminar-{{ $disTmp->id }}" 
                                action="{{ route('pais.destroy', $disTmp->id ) }}" 
                                method="POST" 
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" 
                                        class="btn btn-outline-danger btn-sm" 
                                        onclick="confirmarEliminacion({{ $disTmp->id }})">
                                    <i class="fa fa-trash"></i>
                                </button>
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection