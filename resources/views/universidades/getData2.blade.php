@extends('layouts.app')
@section('title', 'Datos API')

@section('content')
<h1 style="text-align: center">DATOS DE LA UNIVERSIDAD</h1>
<div class="mb-5">
<div class="d-flex justify-content-center mt-5">
  <div class="card" style="width: 18rem;">
    <div class="card-header">
      UNIVERSIDAD
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">ID: {{  $data['id_uni']}}</li>
      <li class="list-group-item">Clave: {{ $data['clave'] }}</li>
      <li class="list-group-item">Nombre: {{ $data['nombre'] }}</li>
      <li class="list-group-item">Activo: {{ $data['activo']}}</li>
    </ul>
  </div>
</div>
@endsection