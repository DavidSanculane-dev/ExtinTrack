<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MovimentacaoModel;
use Illuminate\Http\Request;

class MovimentacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movimentacoes = MovimentacaoModel::all();
        return response()->json($movimentacoes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id_material = $request->input('id_material');
        $tipo_movimentacao = $request->input('tipo_movimentacao');
        $quantidade = $request->input('quantidade');
        $data_movimentacao = $request->input('data_movimentacao');
        $id_utilizador = $request->input('id_utilizador');

        $movimentacao = new MovimentacaoModel();
        $movimentacao->id_material = $id_material;
        $movimentacao->tipo_movimentacao = $tipo_movimentacao;
        $movimentacao->quantidade = $quantidade;
        $movimentacao->data_movimentacao = $data_movimentacao;
        $movimentacao->id_utilizador = $id_utilizador;
        $movimentacao->save();

        return response()->json(['message' => 'Movimentação criada com sucesso', 'movimentacao' => $movimentacao], 201);


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $movimentacao = MovimentacaoModel::find($id);
        if ($movimentacao) {
            return response()->json($movimentacao);
        } else {
            return response()->json(['message' => 'Movimentação não encontrada'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $movimentacao = MovimentacaoModel::find($id);
        if ($movimentacao) {
            $movimentacao->id_material = $request->input('id_material', $movimentacao->id_material);
            $movimentacao->tipo_movimentacao = $request->input('tipo_movimentacao', $movimentacao->tipo_movimentacao);
            $movimentacao->quantidade = $request->input('quantidade', $movimentacao->quantidade);
            $movimentacao->data_movimentacao = $request->input('data_movimentacao', $movimentacao->data_movimentacao);
            $movimentacao->id_utilizador = $request->input('id_utilizador', $movimentacao->id_utilizador);
            $movimentacao->save();
            return response()->json(['message' => 'Movimentação atualizada com sucesso', 'movimentacao' => $movimentacao]);
        } else {
            return response()->json(['message' => 'Movimentação não encontrada'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movimentacao = MovimentacaoModel::find($id);
        if ($movimentacao) {
            $movimentacao->delete();
            return response()->json(['message' => 'Movimentação eliminada com sucesso']);
        } else {
            return response()->json(['message' => 'Movimentação não encontrada'], 404);
        }
    }
}
