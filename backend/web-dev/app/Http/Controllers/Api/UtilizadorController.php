<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UtilizadorModel;
use Illuminate\Http\Request;

class UtilizadorController extends Controller
{
     /**
     * Handle user login
     */
    public function login(Request $request)
    {
        $email = $request->input('email');
        $senha = $request->input('senha');

        $utilizador = UtilizadorModel::where('email', $email)->where('senha', $senha)->first();

        if ($utilizador) {
            return response()->json(['message' => 'Login bem-sucedido', 'utilizador' => $utilizador]);
        } else {
            return response()->json(['message' => 'Credenciais inválidas'], 401);
        }
    }



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $utilizadores = UtilizadorModel::all();
        return response()->json($utilizadores);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nome = $request->input('nome');
        $email = $request->input('email');
        $senha = $request->input('senha');
        $tipo = $request->input('tipo');

        $utilizador = new UtilizadorModel();
        $utilizador->nome = $nome;
        $utilizador->email = $email;
        $utilizador->senha = $senha;
        $utilizador->tipo = $tipo;
        $utilizador->save();

        return response()->json(['message' => 'Utilizador criado com sucesso', 'utilizador' => $utilizador], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $utilizador = UtilizadorModel::find($id);
        if ($utilizador) {
            return response()->json($utilizador);
        } else {
            return response()->json(['message' => 'Utilizador não encontrado'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $utilizador = UtilizadorModel::find($id);
        if ($utilizador) {
            $utilizador->nome = $request->input('nome', $utilizador->nome);
            $utilizador->email = $request->input('email', $utilizador->email);
            $utilizador->senha = $request->input('senha', $utilizador->senha);
            $utilizador->tipo = $request->input('tipo', $utilizador->tipo);
            $utilizador->save();

            return response()->json(['message' => 'Utilizador atualizado com sucesso', 'utilizador' => $utilizador]);
        } else {
            return response()->json(['message' => 'Utilizador não encontrado'], 404);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $utilizador = UtilizadorModel::find($id);
        if ($utilizador) {
            $utilizador->delete();
            return response()->json(['message' => 'Utilizador eliminado com sucesso']);
        } else {
            return response()->json(['message' => 'Utilizador não encontrado'], 404);
        }
    }
}
