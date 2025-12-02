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
<a href="{{route('pais.create')}}">Nuevo Pais</a>
<table> 
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
        </tr>
    </thead>
    <tbody>
        @foreach($paises as $paisTmp)
        <tr>
            <td>{{$paisTmp->id}}</td>
            <td>{{$paisTmp->nombre_pais}}</td>
            <td>
                <a href="{{route('pais.edit',$paisTmp->id)}}">Editar</a>


                <form id="form-eliminar-{{ $paisTmp->id }}" 
                                action="{{ route('pais.destroy', $paisTmp->id ) }}" 
                                method="POST" 
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" 
                                        class="btn btn-outline-danger btn-sm" 
                                        onclick="confirmarEliminacion({{ $paisTmp->id }})">
                                    <i class="fa fa-trash"></i>
                                </button>
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
