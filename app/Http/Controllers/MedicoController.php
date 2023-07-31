<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    public function getAll()
    {
        try {
            $medicos = Medico::all();
            return response()->json($medicos, 200);
        } catch (\Throwable $e) {
            return response()->json([
                'error' => 'Erro ao carregar os médicos',
                'msg' => $e->getMessage()
            ], 500);
        }
    }

    public function getDoctorsByCities($id_cidade)
    {
        try {
            $medicos = Medico::where('cidade_id', '=', $id_cidade)->get();
            return response()->json($medicos, 200);
        } catch (\Throwable $e) {
            return response()->json([
                'error' => 'Erro ao carregar os médicos',
                'msg' => $e->getMessage()
            ], 500);
        }
    }

    public function insertDoctor(Request $request)
    {
        $data = $request->json()->all();
        foreach ($data as $key => $value) {
            if ($key != "nome" && $key != "especialidade" && $key != "cidade_id") return response()->json([
                'error' => 'Apenas o campo nome, especialidade e cidade_id podem ser adicionados'
            ], 422);
        }
        try {
            $medico = Medico::create($data);
            return response()->json($medico, 201);
        } catch (\Throwable $e) {
            return response()->json([
                'error' => 'Falha ao inserir o médico',
                'msg' => $e->getMessage()
            ], 500);
        }
    }
}
