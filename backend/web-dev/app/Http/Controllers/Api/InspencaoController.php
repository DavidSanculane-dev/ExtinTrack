<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\InspecaoModel;
use Illuminate\Http\Request;

class InspencaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inspencoes = InspecaoModel::all();
        return response()->json($inspencoes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id_extintor = $request->input('id_extintor');
        $data_inspencao = $request->input('data_inspencao');
        $id_utilizador = $request->input('id_utilizador');
        $observacoes = $request->input('observacoes');
        $assinatura_digital = $request->input('assinatura_digital');
        $gps_latitude = $request->input('gps_latitude');
        $gps_longitude = $request->input('gps_longitude'); 

        // Verifica se o arquivo foi enviado
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            // Define um nome único para a foto
            $foto_nome = uniqid('foto_') . '.' . $request->file('foto')->getClientOriginalExtension();
            // Salva a foto na pasta storage/app/public/inspencoes
            $request->file('foto')->storeAs('public/inspencoes', $foto_nome);
        } else {
            $foto_nome = null;
        }

        // Salva os dados na base de dados
        $inspecao = new InspecaoModel();
        $inspecao->id_extintor = $id_extintor;
        $inspecao->data_inspencao = $data_inspencao;
        $inspecao->id_utilizador = $id_utilizador;
        $inspecao->observacoes = $observacoes;
        $inspecao->assinatura_digital = $assinatura_digital;
        $inspecao->gps_latitude = $gps_latitude;
        $inspecao->gps_longitude = $gps_longitude;
        $inspecao->foto = $foto_nome; // Salva o nome da foto
        $inspecao->save();

        return response()->json(['message' => 'Inspeção criada com sucesso', 'inspecao' => $inspecao], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $inspecao = InspecaoModel::find($id);
        if ($inspecao) {
            return response()->json($inspecao);
        } else {
            return response()->json(['message' => 'Inspeção não encontrada'], 404);    
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $inspecao = InspecaoModel::find($id);
        if ($inspecao) {
            $inspecao->id_extintor = $request->input('id_extintor', $inspecao->id_extintor);
            $inspecao->data_inspencao = $request->input('data_inspencao', $inspecao->data_inspencao);
            $inspecao->id_utilizador = $request->input('id_utilizador', $inspecao->id_utilizador);
            $inspecao->observacoes = $request->input('observacoes', $inspecao->observacoes);
            $inspecao->assinatura_digital = $request->input('assinatura_digital', $inspecao->assinatura_digital);
            $inspecao->gps_latitude = $request->input('gps_latitude', $inspecao->gps_latitude);
            $inspecao->gps_longitude = $request->input('gps_longitude', $inspecao->gps_longitude);

            // Verifica se o arquivo foi enviado
            if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
                // Define um nome único para a foto
                $foto_nome = uniqid('foto_') . '.' . $request->file('foto')->getClientOriginalExtension();
                // Salva a foto na pasta storage/app/public/inspencoes
                $request->file('foto')->storeAs('public/inspencoes', $foto_nome);
                // Atualiza o nome da foto no banco de dados
                $inspecao->foto = $foto_nome;
            }

            $inspecao->save();
            return response()->json(['message' => 'Inspeção atualizada com sucesso', 'inspecao' => $inspecao]);
        } else {
            return response()->json(['message' => 'Inspeção não encontrada'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $inspecao = InspecaoModel::find($id);
        if ($inspecao) {
            $inspecao->delete();   
            return response()->json(['message' => 'Inspeção eliminada com sucesso']);
        } else {
            return response()->json(['message' => 'Inspeção não encontrada'], 404);    
        }
    }
}
