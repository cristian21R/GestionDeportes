@extends('layout.admin')
@section('contenido')
<h1>Nuevo Registro</h1>
<form action="{{route('pais.store')}}" method="POST" id="frm_pais">
    @csrf
    <label for="">Nombre:</label>
    <br>
    <input type="text" name="nombre_pais" id="nombre_pais">
    <br>
    <button type="submit" >Guardar</button>
    <a href="">Cancelar</a>
</form>
@endsection