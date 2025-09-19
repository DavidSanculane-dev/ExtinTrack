<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LocalModel;
use Illuminate\Http\Request;

class LocalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locais = LocalModel::all();
        return response()->json($locais);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nome_local = $request->input('nome_local');
        $descricao = $request->input('descricao');
        $gps_latitude = $request->input('gps_latitude');
        $gps_longitude = $request->input('gps_longitude');

        $local = new LocalModel();
        $local->nome_local = $nome_local;
        $local->descricao = $descricao;
        $local->gps_latitude = $gps_latitude; 
        $local->gps_longitude = $gps_longitude;
        $local->save();

        return response()->json(['message' => 'Local criado com sucesso', 'local' => $local], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $local = LocalModel::find($id);
        if ($local) {
            return response()->json($local);
        } else {
            return response()->json(['message' => 'Local não encontrado'], 404);    
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $local = LocalModel::find($id);
        if ($local) {
            $local->nome_local = $request->input('nome_local', $local->nome_local);
            $local->descricao = $request->input('descricao', $local->descricao);
            $local->gps_latitude = $request->input('gps_latitude', $local->gps_latitude);
            $local->gps_longitude = $request->input('gps_longitude', $local->gps_longitude);
            $local->save();
            return response()->json(['message' => 'Local atualizado com sucesso', 'local' => $local]);
        } else {
            return response()->json(['message' => 'Local não encontrado'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $local = LocalModel::find($id);
        if ($local) {
            $local->delete();   
            return response()->json(['message' => 'Local eliminado com sucesso']);
        } else {
            return response()->json(['message' => 'Local não encontrado'], 404);    
        }
    }
}
