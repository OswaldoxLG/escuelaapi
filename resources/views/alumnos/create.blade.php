@extends('layouts.app')

@section('title', 'Crear Alumnos')

@section('content')
<h1>ALTA DE ALUMNOS</h1>

{{-- @if($errors->any())
  <div>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif --}}

<form action="{{ url('/api/alta-api')}}" method="POST">
  @csrf
  <div>
    <label for="matricula">Matrícula</label>
    <input type="text" name="matricula" placeholder="matricula" required>
  </div>

  <div>
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" placeholder="nombre" required>
  </div>

  <div>
    <label for="apellido_paterno">Apellido Paterno</label>
    <input type="text" name="app" placeholder="apellido_paterno" required>
  </div>

  <div>
    <label for="apellido_materno">Apellido Materno</label>
    <input type="text" name="apm" placeholder="apellido_materno" required>
  </div>

  <div>
    <label for="fecha_nacimiento">Fecha de Nacimiento</label>
    <input type="date" name="fn" placeholder="fecha_nacimiento">
  </div>

  <div>
    <label for="sexo">Sexo</label>
    <select name="sexo">
      <option value="femenino">Femenino</option>
      <option value="masculino">Masculino</option>
      <option value="otra">Otra</option>
    </select>
  </div>

  <div>
    <label for="email">Email</label>
    <input type="text" name="email" placeholder="email">
  </div>

  <div>
    <label for="password">Contraseña</label>
    <input type="text" name="pass" placeholder="password">
  </div>

  <div>
    <label for="id_grupo">Grupo</label>
    <input type="text" name="id_grupo" placeholder="Grupo">
  </div>

  <div>
    <label for="activo">Activo</label>
    <select name="activo">
      <option value="1">Verdadero</option>
      <option value="0">Falso</option>
    </select>
  </div> 

  <div>
    <button type="submit">Enviar</button>
  </div>
</form>
@endsection