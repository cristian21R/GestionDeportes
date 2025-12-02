@extends('layout.admin')

@section('contenido')

<script>
    function confirmarEliminacion(id) {
        Swal.fire({
            title: "¿Está seguro de eliminar?",
            text: "¡No podrá recuperar este registro!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, eliminar",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('form-eliminar-' + id).submit();
            }
        });
    }
</script>

<div class="container">

    <div style="text-align: center;">
        <h3 class="fw-bold">Listado de Disciplinas</h3>
        <br>
    </div>

    <div style="text-align: right;">
        <a href="{{ route('disciplina.create') }}" class="btn btn-primary">
            <i class="fa fa-plus"></i> Nueva Disciplina
        </a>
    </div>
    <br>

    <div style="text-align: center;">

        <table class="table table-striped table-hover mb-0" id="tbl">
            <thead class="bg-primary text-white">
                <tr>
                    <th style="width: 60px;">ID</th>
                    <th>Nombre Disciplina</th>
                    <th style="width: 150px;" class="text-center">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach($disciplinas as $disTmp)
                    <tr>
                        <td>{{ $disTmp->id }}</td>
                        <td>{{ $disTmp->nombre_disciplina }}</td>

                        <td class="text-center">

                            <a href="{{ route('disciplina.edit', $disTmp->id) }}"
                               class="btn btn-warning btn-sm me-2">
                                <i class="fa fa-edit"></i>
                            </a>

                            <form id="form-eliminar-{{ $disTmp->id }}"
                                  action="{{ route('disciplina.destroy', $disTmp->id) }}"
                                  method="POST"
                                  style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <button type="button"
                                        class="btn btn-danger btn-sm"
                                        onclick="confirmarEliminacion({{ $disTmp->id }})">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>

</div>

<script>
    let table = new DataTable('#tbl', {
    layout: {
        topStart: {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }
    },
    language: {
        url: 'https://cdn.datatables.net/plug-ins/2.3.2/i18n/es-ES.json',
    },
});
    
</script>
@endsection
