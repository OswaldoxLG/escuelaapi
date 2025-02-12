@extends('layouts.app')

@section('title', 'Lista de carreras')

@section('content')
<h1>LISTA DE CARRERAS</h1>
<div class="text-start">
    <a href="{{url('/api/carrera/create')}}" class="btn btn-primary">Crear</a>
</div>
<br>
<table class="table table-bordered border-warning">
    <thead>
      <tr class="table-dark">
        <th scope="col">Id</th>
        <th scope="col">Clave</th>
        <th scope="col">Nombre</th>
        <th scope="col">Activa</th>
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
        <td>{{ $item['id_carrera'] }}</td>
        <td>{{ $item['clave'] }}</td>
        <td>{{ $item['nombre'] }}</td>
        <td>{{ $item['activa'] }}</td>
      <td>
          <a href="{{ url('/api/consultar2-api-carrera/'.$item['id_carrera']) }}">Mostrar</a>
      </td>
      <td>
          <a href="{{ url('/api/carrera/'.$item['id_carrera'].'/edit') }}">Editar</a>
      </td>
      <td>
          <form action="{{ url('/api/borrar-api-carrera/'.$item['id_carrera']) }}" method="POST">
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


