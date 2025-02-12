<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class GrupoControllerAPI extends Controller
{
    public function getData(){
        //solicitar todos los registros a la API
        $response = Http::get('http://localhost:3001/api/grupos');

        if ($response->successful()) {
            $data = $response->json();

            return view('grupos.getData', compact('data'));
        } else {
            return response()->json(['error' => 'Error al consultar la API'], 500);
        }
    }

    public function getData2($id_grupo){
        
        $response = Http::get('http://localhost:3001/api/grupos/'.$id_grupo);

        if($response->successful()){
            $data = $response->json();
            return view('grupos.getData2', compact('data'));
        } else {
            return response()->json(['error' => 'Error al consultar la API',500]);
        }
    }

    public function createData(){
        return view('grupos.create');
    }

    public function postData(Request $request){
        $validated = $request->validate([
            'clave' => 'required|string',
            'nombre' => 'required|string|max:200',
            'activo' => 'required|boolean',
        ]);

        $response = Http::post('http://localhost:3001/api/grupos/',$validated);

        if($response->successful()){
            return redirect('/api/consultar-api-grupo');
        } else {
            return response()->json(['error'=> 'Error al insertar datos'], 500);
        }
    }

    public function edit($id_grupo)
    {
        $response = Http::get('http://localhost:3001/api/grupos/'.$id_grupo);

        if($response->successful()){
            $grupo = $response->json();
            return view('grupos.edit', compact('grupo'));
        } else {
            return response()->json(['error' => 'Error al consultar la API'], 500);
        }
    }

    public function updateData(Request $request, $id_grupo){
        $validated = $request->validate([
            'clave' => 'string',
            'nombre' => 'string|max:200',
            'activo' => 'boolean',
        ]);

        $response = Http::put('http://localhost:3001/api/grupos/'.$id_grupo, $validated);


        if($response->successful()){
            return redirect('/api/consultar-api-grupo');
        } else {
            return response()->json(['error'=> 'Error al actualizar los datos'], 500);
        }
    }

    public function deleteData($id_grupo){
        $response = Http::delete('http://localhost:3001/api/grupos/'.$id_grupo);

        if($response->successful()){
            return redirect('/api/consultar-api-grupo');
        } else {
            return response()->json(['error'=> 'Error al eliminar el recurso'], 500);
        }
    }
}
