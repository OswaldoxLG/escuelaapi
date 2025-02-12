@extends('layouts.app')

@section('title', 'Crear Universidad')

@section('content')
<h1 style="text-align: center">ALTA DE UNIVERSIDADES</h1>

<form action="{{ url('/api/alta-api-uni')}}" method="POST" class="d-flex justify-content-center">
  @csrf
  <div class="col-md-6">
    <div class="mb-3">
      <label for="clave" class="form-label">Clave</label>
      <input type="text" name="clave" placeholder="clave" class="form-control w-80" required>
    </div>

    <div class="mb-3">
      <label for="nombre" class="form-label">Nombre</label>
      <input type="text" name="nombre" placeholder="nombre" class="form-control w-80" required>
    </div>

    <div class="mb-3">
      <label for="activo" class="form-label">Activo</label>
      <select name=activo class="form-control w-80">
        <option value=1>Verdadero</option>
        <option value=0>Falso</option>
      </select>
    </div> 

    <div class="mb-5">
      <button type=submit class="btn btn-primary">Enviar</button>
      <button type=button class="btn btn-outline-dark"><a href="{{ url('/api/consultar-api-uni')}}" style="text-decoration: none">Volver</a></button>
    </div>
  </div> 
</form>
@endsection
