@php
use Carbon\Carbon;
@endphp

@extends('layouts.app')

@section('title', 'Modificar Alumnos')

@section('content')
<h1>MODIFICACION DE ALUMNOS</h1>

{{-- @if($errors->any())
  <div>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif --}}

<form action="{{ url('/api/actualizar-api/'.$alumno['id_alumno']) }}" method="POST">
  @csrf
  @method('PUT')
  <div>
    <label for="matricula">Matrícula</label>
    <input type="text" name="matricula" placeholder="matricula" value="{{ $alumno['matricula'] }}" required>
  </div>

  <div>
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" placeholder="nombre" value="{{ $alumno['nombre'] }}" required>
  </div>

  <div>
    <label for="apellido_paterno">Apellido Paterno</label>
    <input type="text" name="app" placeholder="apellido_paterno" value="{{ $alumno['app'] }}" required>
  </div>

  <div>
    <label for="apellido_materno">Apellido Materno</label>
    <input type="text" name="apm" placeholder="apellido_materno" value="{{ $alumno['apm'] }}" required>
  </div>

  <div>
    <label for="fecha_nacimiento">Fecha de Nacimiento</label>
    <input type="date" name="fn" placeholder="fecha_nacimiento" value="{{ Carbon::parse($alumno['fn'])->format('Y-m-d') }}">
  </div>

  <div>
    <label for="sexo">Sexo</label>
    <select name="sexo">
      <option value="femenino" {{ $alumno['sexo'] == 'femenino' ? 'selected' : '' }}>Femenino</option>
      <option value="masculino" {{ $alumno['sexo'] == 'masculino' ? 'selected' : '' }}>Masculino</option>
      <option value="otra" {{ $alumno['sexo'] == 'otra' ? 'selected' : '' }}>Otra</option>
    </select>
  </div>

  <div>
    <label for="email">Email</label>
    <input type="text" name="email" placeholder="email" value="{{ $alumno['email'] }}">
  </div>

  <div>
    <label for="password">Contraseña</label>
    <input type="text" name="pass" placeholder="password" value="{{ $alumno['pass'] }}">
  </div>

  <div>
    <label for="id_grupo">Grupo</label>
    <input type="text" name="id_grupo" placeholder="Grupo" value="{{ $alumno['id_grupo'] }}">
  </div>

  <div>
    <label for="activo">Activo</label>
    <select name="activo">
      <option value="1" {{ $alumno['activo'] == 1 ? 'selected' : '' }}>Verdadero</option>
      <option value="0" {{ $alumno['activo'] == 0 ? 'selected' : '' }}>Falso</option>
    </select>
  </div> 

  <div>
    <button type="submit">Enviar</button>
  </div>
</form>
@endsection