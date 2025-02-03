@php
use Carbon\Carbon;
@endphp
@extends('layouts.app')

@section('title', 'Lista de estudiantes')

@section('content')
<h1>LISTA DE ESTUDIANTES</h1>
<div class="text-end">
    <a href="{{url('/api/alu/create')}}" class="btn btn-primary" id="crear_user">Crear</a>
</div>
<br>
<table class="table table-bordered border-warning">
    <thead>
      <tr class="table-dark">
        <th scope="col">Id</th>
        <th scope="col">Matrícula</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido Paterno</th>
        <th scope="col">Apellido Materno</th>
        <th scope="col">Fecha Nacimiento</th>
        <th scope="col">Sexo</th>
        <th scope="col">Email</th>
        <th scope="col">id_grupo</th>
        <th scope="col">Activo</th>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
      @if(empty($data))
        <tr>
          <td colspan="12">No hay datos disponibles</td>
        </tr>
      @else
      @foreach($data as $item)
      <tr>
        <td>{{ $item['id_alumno'] }}</td>
        <td>{{ $item['matricula'] }}</td>
        <td>{{ $item['nombre'] }}</td>
        <td>{{ $item['app'] }}</td>
        <td>{{ $item['apm'] }}</td>
        <td>{{ \Carbon\Carbon::parse($item['fn'])->format('Y-m-d') }}</td>
        <td>{{ $item['sexo'] }}</td>
        <td>{{ $item['email'] }}</td>
        <td>{{ $item['id_grupo'] }}</td>
        <td>{{ $item['activo'] }}</td>
      <td>
          <a href="{{ url('/api/consultar2-api/'.$item['id_alumno']) }}">Mostrar</a>
      </td>
      <td>
          <a href="{{ url('/api/alu/'.$item['id_alumno'].'/edit') }}">Editar</a>
      </td>
      <td>
          <form action="{{ url('/api/borrar-api/'.$item['id_alumno']) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit">Borrar</button>
          </form>
      </td> 
      </tr>
      @endforeach
      @endif
    </tbody>
  </table>
  
@endsection


