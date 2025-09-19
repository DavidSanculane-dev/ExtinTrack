<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MaterialModel;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materias = MaterialModel::all();
        return response()->json($materias);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nome_material = $request->input('nome_material');
        $quantidade = $request->input('quantidade');
        $unidade = $request->input('unidade');
        $local_armazenamento = $request->input('local_armazenamento');
        $data_entrada = $request->input('data_entrada');
        $data_saida = $request->input('data_saida');

        $material = new MaterialModel();
        $material->nome_material = $nome_material;
        $material->quantidade = $quantidade;
        $material->unidade = $unidade;
        $material->local_armazenamento = $local_armazenamento;
        $material->data_entrada = $data_entrada;
        $material->data_saida = $data_saida;
        $material->save();

        return response()->json(['message' => 'Material criado com sucesso', 'material' => $material], 201);    

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $material = MaterialModel::find($id);
        if ($material) {
            return response()->json($material);
        } else {
            return response()->json(['message' => 'Material não encontrado'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $material = MaterialModel::find($id);
        if ($material) {
            $material->nome_material = $request->input('nome_material', $material->nome_material);
            $material->quantidade = $request->input('quantidade', $material->quantidade);
            $material->unidade = $request->input('unidade', $material->unidade);
            $material->local_armazenamento = $request->input('local_armazenamento', $material->local_armazenamento);
            $material->data_entrada = $request->input('data_entrada', $material->data_entrada);
            $material->data_saida = $request->input('data_saida', $material->data_saida);
            $material->save();
            return response()->json(['message' => 'Material atualizado com sucesso', 'material' => $material]);
        } else {
            return response()->json(['message' => 'Material não encontrado'], 404); 
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $material = MaterialModel::find($id);
        if ($material) {
            $material->delete();
            return response()->json(['message' => 'Material eliminado com sucesso']);
        } else {
            return response()->json(['message' => 'Material não encontrado'], 404);
        }
    }
}
