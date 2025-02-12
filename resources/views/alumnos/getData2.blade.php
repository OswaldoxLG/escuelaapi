@php
use Carbon\Carbon;
@endphp
@extends('layouts.app')
@section('title', 'Datos API')

@section('content')
<h1 style="text-align: center">DATOS DEL ALUMNO</h1>
<div class="mb-5">
<div class="d-flex justify-content-center mt-5">
  <div class="card" style="width: 18rem;">
    <div class="card-header">
      ALUMNO
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">ID: {{  $data['id_alumno']}}</li>
      <li class="list-group-item">Matricula: {{ $data['matricula'] }}</li>
      <li class="list-group-item">Nombre: {{ $data['nombre'] }}</li>
      <li class="list-group-item">Apellido Paterno: {{ $data['app']}}</li>
      <li class="list-group-item">Apellido Materno: {{ $data['apm']}}</li>
      <li class="list-group-item">Fecha Nacimiento: {{ Carbon::parse($data['fn'])->format('Y-m-d') }}</li>
      <li class="list-group-item">Sexo: {{ $data['sexo']}}</li>
      <li class="list-group-item">Email: {{ $data['email']}}</li>
      <li class="list-group-item">Grupo: {{ $data['id_grupo']}}</li>
      <li class="list-group-item">Activo: {{ $data['activo']}}</li>
    </ul>
  </div>
</div>
@endsection