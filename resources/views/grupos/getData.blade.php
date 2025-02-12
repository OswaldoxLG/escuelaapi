@extends('layouts.app')

@section('title', 'Lista de grupos')

@section('content')
<h1 style="text-align: center">LISTA DE GRUPOS</h1>
<div class="text-start">
    <a href="{{url('/api/grupo/create')}}" class="btn btn-primary">Crear</a>
</div>
<br>
<table class="table table-bordered border-warning">
    <thead>
      <tr class="table-dark">
        <th scope="col">Id</th>
        <th scope="col">Clave</th>
        <th scope="col">Nombre</th>
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
        <td>{{ $item['id_grupo'] }}</td>
        <td>{{ $item['clave'] }}</td>
        <td>{{ $item['nombre'] }}</td>
        <td>{{ $item['activo'] }}</td>
      <td>
          <a href="{{ url('/api/consultar2-api-grupo/'.$item['id_grupo']) }}">Mostrar</a>
      </td>
      <td>
          <a href="{{ url('/api/grupo/'.$item['id_grupo'].'/edit') }}">Editar</a>
      </td>
      <td>
          <form action="{{ url('/api/borrar-api-grupo/'.$item['id_grupo']) }}" method="POST">
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


