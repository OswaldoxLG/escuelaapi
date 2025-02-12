@php
use Carbon\Carbon;
@endphp

@extends('layouts.app')

@section('title', 'Modificar Alumnos')

@section('content')
<h1 style="text-align: center">MODIFICACION DE ALUMNOS</h1>

<form action="{{ url('/api/actualizar-api/'.$alumno['id_alumno']) }}" method="POST" class="d-flex justify-content-center">
  @csrf
  @method('PUT')
  <div class="col-md-6">
    <div class="mb-3">
      <label for="matricula" class="form-label">Matrícula</label>
      <input type="text" name="matricula" placeholder="matricula" value="{{ $alumno['matricula'] }}" class="form-control w-80" required>
    </div>
  
    <div class="mb-3">
      <label for="nombre" class="form-label">Nombre</label>
      <input type="text" name="nombre" placeholder="nombre" value="{{ $alumno['nombre'] }}" class="form-control w-80" required>
    </div>
  
    <div class="mb-3">
      <label for="apellido_paterno" class="form-label">Apellido Paterno</label>
      <input type="text" name="app" placeholder="apellido_paterno" value="{{ $alumno['app'] }}" class="form-control w-80" required>
    </div>
  
    <div class="mb-3">
      <label for="apellido_materno" class="form-label">Apellido Materno</label>
      <input type="text" name="apm" placeholder="apellido_materno" value="{{ $alumno['apm'] }}" class="form-control w-80" required>
    </div>
  
    <div class="mb-3">
      <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
      <input type="date" name="fn" placeholder="fecha_nacimiento" value="{{ Carbon::parse($alumno['fn'])->format('Y-m-d') }}" class="form-control w-80">
    </div>
  
    <div class="mb-3">
      <label for="sexo" class="form-label">Sexo</label>
      <select name="sexo" class="form-control w-80">
        <option value="femenino" {{ $alumno['sexo'] == 'femenino' ? 'selected' : '' }}>Femenino</option>
        <option value="masculino" {{ $alumno['sexo'] == 'masculino' ? 'selected' : '' }}>Masculino</option>
        <option value="otra" {{ $alumno['sexo'] == 'otra' ? 'selected' : '' }}>Otra</option>
      </select>
    </div>
  
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="text" name="email" placeholder="email" value="{{ $alumno['email'] }}" class="form-control w-80">
    </div>
  
    <div class="mb-3">
      <label for="password" class="form-label">Contraseña</label>
      <input type="text" name="pass" placeholder="password" value="{{ $alumno['pass'] }}" class="form-control w-80">
    </div>
  
    <div class="mb-3">
      <label for="id_grupo" class="form-label">Grupo</label>
      <input type="text" name="id_grupo" placeholder="Grupo" value="{{ $alumno['id_grupo'] }}" class="form-control w-80">
    </div>
  
    <div class="mb-3">
      <label for="activo" class="form-label">Activo</label>
      <select name="activo" class="form-control w-80">
        <option value="1" {{ $alumno['activo'] == 1 ? 'selected' : '' }}>Verdadero</option>
        <option value="0" {{ $alumno['activo'] == 0 ? 'selected' : '' }}>Falso</option>
      </select>
    </div> 
  
    <div class="mb-5">
      <button type=submit class="btn btn-primary">Enviar</button>
      <button type=button class="btn btn-outline-dark"><a href="{{ url('/api/consultar-api')}}" style="text-decoration: none">Volver</a></button>
    </div>
  </div>
</form>
@endsection