@extends('layout.admin')
@section('contenido')
<h1>Editar Registro</h1>
<form action="{{route('pais.update', $pais->id)}}" method="POST" id="frm_pais">
    @csrf
    @method('PUT') 
    <label for="">Nombre:</label>
    <br>
    <input type="hidden" name="id_pais" id="id_pais" value="{{$pais->id}}">
    <input type="text" name="nombre_pais" id="nombre_pais" value="{{$pais->nombre_pais}}">
    <br>
    <button type="submit" >Actualizar</button>
    <a href="">Cancelar</a>
</form>
@endsection