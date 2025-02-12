<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
USE Illuminate\Support\Facades\Http;
class CarreraControllerAPI extends Controller
{
    public function getData(){
        //solicitar todos los registros a la API
        $response = Http::get('http://localhost:3001/api/carreras');

        if ($response->successful()) {
            $data = $response->json();

            return view('carreras.getData', compact('data'));
        } else {
            return response()->json(['error' => 'Error al consultar la API'], 500);
        }
    }

    public function getData2($id_carrera){
        
        $response = Http::get('http://localhost:3001/api/carreras/'.$id_carrera);

        if($response->successful()){
            $data = $response->json();
            return view('carreras.getData2', compact('data'));
        } else {
            return response()->json(['error' => 'Error al consultar la API',500]);
        }
    }

    public function createData(){
        return view('carreras.create');
    }

    public function postData(Request $request){
        $validated = $request->validate([
            'clave' => 'required|string',
            'nombre' => 'required|string|max:200',
            'activa' => 'required|boolean',
        ]);

        $response = Http::post('http://localhost:3001/api/carreras/',$validated);

        if($response->successful()){
            return redirect('/api/consultar-api-carrera');
        } else {
            return response()->json(['error'=> 'Error al insertar datos'], 500);
        }
    }

    public function edit($id_carrera)
    {
        $response = Http::get('http://localhost:3001/api/carreras/'.$id_carrera);

        if($response->successful()){
            $carrera = $response->json();
            return view('carreras.edit', compact('carrera'));
        } else {
            return response()->json(['error' => 'Error al consultar la API'], 500);
        }
    }

    public function updateData(Request $request, $id_carrera){
        $validated = $request->validate([
            'clave' => 'string',
            'nombre' => 'string|max:200',
            'activa' => 'boolean',
        ]);

        $response = Http::put('http://localhost:3001/api/carreras/'.$id_carrera, $validated);


        if($response->successful()){
            return redirect('/api/consultar-api-carrera');
        } else {
            return response()->json(['error'=> 'Error al actualizar los datos'], 500);
        }
    }

    public function deleteData($id_carrera){
        $response = Http::delete('http://localhost:3001/api/carreras/'.$id_carrera);

        if($response->successful()){
            return redirect('/api/consultar-api-carrera');
        } else {
            return response()->json(['error'=> 'Error al eliminar el recurso'], 500);
        }
    }
}
