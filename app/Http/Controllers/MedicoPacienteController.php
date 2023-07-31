<?php

namespace App\Http\Controllers;

use App\Models\MedicoPaciente;
use Illuminate\Http\Request;

class MedicoPacienteController extends Controller
{
    public function linkPatientDoctor(Request $request, $id_medico)
    {
        $data = $request->json()->all();
        if ($data['medico_id'] != $id_medico) {
            return response()->json([
                'error' => 'id na URL diferente do id do body'
            ], 409); //Validação para o id da url estar igual a do body
        }
        foreach ($data as $key => $value) {
            if ($key != "medico_id" && $key != "paciente_id") return response()->json([
                'error' => 'Apenas o campo medico_id e paciente_id podem ser adicionados'
            ], 422);
        }
        try {
            $medicoPaciente = MedicoPaciente::create($data);
            return response()->json($medicoPaciente, 201);
        } catch (\Throwable $e) {
            return response()->json([
                'error' => 'Falha ao vincular paciente e médico',
                'msg' => $e->getMessage()
            ], 500);
        }
    }
}
