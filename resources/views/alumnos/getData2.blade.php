@extends('layouts.app')
@section('title', 'Datos API')

@section('content')
<div>
  <h1>Datos de la API</h1>
    <ul>
        <li>{{ $data['nombre'] }} - {{ $data['matricula'] }}</li>
    </ul>
</div>
@endsection