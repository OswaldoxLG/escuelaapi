<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;


class AlumnoControllerAPI extends Controller
{
    public function getData(){
        //solicitar todos los registros a la API
        $response = Http::get('http://localhost:3001/api/registros');

        if ($response->successful()) {
            $data = $response->json();

            return view('alumnos.getData', compact('data'));
        } else {
            return response()->json(['error' => 'Error al consultar la API'], 500);
        }
    }

    public function getData2($id_alumno){
        
        $response = Http::get('http://localhost:3001/api/registros/'.$id_alumno);

        if($response->successful()){
            $data = $response->json();
            return view('alumnos.getData2', compact('data'));
        } else {
            return response()->json(['error' => 'Error al consultar la API',500]);
        }
    }

    public function createData(){
        return view('alumnos.create');
    }

    public function postData(Request $request){
        $validated = $request->validate([
            'matricula' => 'required|integer',
            'nombre' => 'required|string|max:255',
            'app' => 'required|string|max:255',
            'apm' => 'required|string|max:255',
            'fn' => 'required|date',
            'sexo' => 'required|string',
            'email' => 'required|email|max:255',
            'pass' => 'required|string|min:8',
            'id_grupo' => 'required|integer',
            'activo' => 'required|boolean',
        ]);

        $response = Http::post('http://localhost:3001/api/registros/',$validated);

        if($response->successful()){
            return redirect('/api/consultar-api');
        } else {
            return response()->json(['error'=> 'Error al insertar datos'], 500);
        }
    }

    public function edit($id_alumno)
    {
        $response = Http::get('http://localhost:3001/api/registros/'.$id_alumno);

        if($response->successful()){
            $alumno = $response->json();
            return view('alumnos.edit', compact('alumno'));
        } else {
            return response()->json(['error' => 'Error al consultar la API'], 500);
        }
    }

    public function updateData(Request $request, $id_alumno){
        $validated = $request->validate([
            'matricula' => 'integer',
            'nombre' => 'string|max:255',
            'app' => 'string|max:255',
            'apm' => 'string|max:255',
            'fn' => 'date',
            'sexo' => 'string',
            'email' => 'email|max:255',
            'pass' => 'string|min:8',
            'id_grupo' => 'integer',
            'activo' => 'boolean',
        ]);

        $response = Http::put('http://localhost:3001/api/registros/'.$id_alumno, $validated);


        if($response->successful()){
            return redirect('/api/consultar-api');
        } else {
            return response()->json(['error'=> 'Error al actualizar los datos'], 500);
        }
    }

    public function deleteData($id_alumno){
        $response = Http::delete('http://localhost:3001/api/registros/'.$id_alumno);

        if($response->successful()){
            return redirect('/api/consultar-api');
        } else {
            return response()->json(['error'=> 'Error al eliminar el recurso'], 500);
        }
    }
}
