<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ExtintorModel;
use Illuminate\Http\Request;

class ExtintorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $extintores = ExtintorModel::all();
        return response()->json($extintores);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $codigo_qr = $request->input('codigo_qr');
        $tipo_extintor = $request->input('tipo_extintor');
        $data_validade = $request->input('data_validade');
        $localizacao = $request->input('localizacao');
        $status = $request->input('status');
        $id_local = $request->input('id_local');

        $extintor = new ExtintorModel();
        $extintor->codigo_qr = $codigo_qr;
        $extintor->tipo_extintor = $tipo_extintor;
        $extintor->data_validade = $data_validade;
        $extintor->localizacao = $localizacao;
        $extintor->status = $status;
        $extintor->id_local = $id_local;
        $extintor->save();

        return response()->json(['message' => 'Extintor criado com sucesso', 'extintor' => $extintor], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $extintor = ExtintorModel::find($id);
       if ($extintor) {
           return response()->json($extintor);
       } else {
           return response()->json(['message' => 'Extintor não encontrado'], 404);
       }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $extintor = ExtintorModel::find($id);
        if ($extintor) {
            $extintor->codigo_qr = $request->input('codigo_qr', $extintor->codigo_qr);
            $extintor->tipo_extintor = $request->input('tipo_extintor', $extintor->tipo_extintor);  
            $extintor->data_validade = $request->input('data_validade', $extintor->data_validade);
            $extintor->localizacao = $request->input('localizacao', $extintor->localizacao);
            $extintor->status = $request->input('status', $extintor->status);
            $extintor->id_local = $request->input('id_local', $extintor->id_local);
            $extintor->save();
            return response()->json(['message' => 'Extintor atualizado com sucesso', 'extintor' => $extintor]);
        } else {
            return response()->json(['message' => 'Extintor não encontrado'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $extintor = ExtintorModel::find($id);
        if ($extintor) {
            $extintor->delete();
            return response()->json(['message' => 'Extintor eliminado com sucesso']);
        } else {
            return response()->json(['message' => 'Extintor não encontrado'], 404);
        }
    }
}
