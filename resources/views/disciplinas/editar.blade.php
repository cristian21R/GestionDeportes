@extends ('layout.admin')
@section ('contenido')


<form action="{{route ('disciplina.store', $disciplina->id)}}" method="post">
    @csrf
    @method('PUT') 
    <label for="">Nombre:</label>
    <br>
    <input type="text" placeholder="Ingrese el nombre de la disciplina..." id="nombre_disciplina" name="nombre_disciplina" value="{{$disciplina->nombre_disciplina}}">
    <br>
    <button type="submit">Actualizar</button>
    <a href="{{route ('disciplina.index')}}">Cancelar</a>
</form>

@endsection