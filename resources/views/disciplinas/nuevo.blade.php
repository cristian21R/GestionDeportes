@extends('layout.admin')
@section('contenido')


<form action="{{route ('disciplina.store')}}" method="post">
    @csrf

    <label for="">Nombre:</label>
    <br>
    <input type="text" placeholder="Ingrese el nombre de la disciplina..." id="nombre_disciplina" name="nombre_disciplina">
    <br>
    <button type="submit">Guardar</button>
    <a href="{{route ('disciplina.index')}}">Cancelar</a>
</form>
@endsection