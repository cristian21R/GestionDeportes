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
                <a href="">Editar</a>
                <a href="">Eliminar</a>
            </td>
        </tr>
    </tbody>
</table>