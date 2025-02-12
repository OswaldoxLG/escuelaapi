<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class UniversidadAPI extends Controller
{
    public function getData(){
        //solicitar todos los registros a la API
        $response = Http::get('http://localhost:3001/api/universidades');

        if ($response->successful()) {
            $data = $response->json();

            return view('universidades.getData', compact('data'));
        } else {
            return response()->json(['error' => 'Error al consultar la API'], 500);
        }
    }

    public function getData2($id_uni){
        
        $response = Http::get('http://localhost:3001/api/universidades/'.$id_uni);

        if($response->successful()){
            $data = $response->json();
            return view('universidades.getData2', compact('data'));
        } else {
            return response()->json(['error' => 'Error al consultar la API',500]);
        }
    }

    public function createData(){
        return view('universidades.create');
    }

    public function postData(Request $request){
        $validated = $request->validate([
            'clave' => 'required|string',
            'nombre' => 'required|string|max:200',
            'activo' => 'required|boolean',
        ]);

        $response = Http::post('http://localhost:3001/api/universidades/',$validated);

        if($response->successful()){
            return redirect('/api/consultar-api-uni');
        } else {
            return response()->json(['error'=> 'Error al insertar datos'], 500);
        }
    }

    public function edit($id_uni)
    {
        $response = Http::get('http://localhost:3001/api/universidades/'.$id_uni);

        if($response->successful()){
            $universidad = $response->json();
            return view('universidades.edit', compact('universidad'));
        } else {
            return response()->json(['error' => 'Error al consultar la API'], 500);
        }
    }

    public function updateData(Request $request, $id_uni){
        $validated = $request->validate([
            'clave' => 'string',
            'nombre' => 'string|max:200',
            'activo' => 'boolean',
        ]);

        $response = Http::put('http://localhost:3001/api/universidades/'.$id_uni, $validated);


        if($response->successful()){
            return redirect('/api/consultar-api-uni');
        } else {
            return response()->json(['error'=> 'Error al actualizar los datos'], 500);
        }
    }

    public function deleteData($id_uni){
        $response = Http::delete('http://localhost:3001/api/universidades/'.$id_uni);

        if($response->successful()){
            return redirect('/api/consultar-api-uni');
        } else {
            return response()->json(['error'=> 'Error al eliminar el recurso'], 500);
        }
    }
}
