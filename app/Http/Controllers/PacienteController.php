<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function getAll()
    {
        try {
            $pacientes = Paciente::all();
            if (!$pacientes) return response()->json(['error' => 'Paciente não encontrado'], 404);

            return response()->json($pacientes, 200);
        } catch (\Throwable $e) {
            return response()->json([
                'error' => 'Erro carregar as cidades',
                'msg' => $e->getMessage()
            ], 500);
        }
    }

    public function getPatientsByDoctor($id_medico)
    {
        if (!$id_medico) return response()->json(['error' => 'Id do medico é obrigatório na url'], 404);
        try {
            $pacientes = Paciente::join('medico_paciente', 'paciente.id', '=', 'medico_paciente.paciente_id')
                                 ->where('medico_paciente.medico_id', $id_medico)
                                 ->select('paciente.id', 'paciente.nome', 'paciente.cpf', 'paciente.celular')
                                 ->get();
            if (!$pacientes) return response()->json(['error' => 'Paciente não encontrado'], 404);

            return response()->json($pacientes, 200);
        } catch (\Throwable $e) {
            return response()->json([
                'error' => 'Erro listar os pacientes',
                'msg' => $e->getMessage()
            ], 500);
        }
    }

    public function insertPatient(Request $request)
    {
        $data = $request->json()->all();
        foreach ($data as $key => $value) {
            if ($key != "nome" && $key != "celular" && $key != "cpf") return response()->json(['error' => 'Apenas o campo nome, celular e cpf podem ser adicionados'], 422);
        }
        $pacienteExistente = Paciente::where('cpf', 'like', $data['cpf'])->first();
        if ($pacienteExistente) return response()->json(['error' => 'Usuario com esse CPF já existente'], 409);

        try {
            $paciente = Paciente::create($data);
            return response()->json($paciente, 201);
        } catch (\Throwable $e) {
            return response()->json([
                'error' => 'Erro ao adicionar o paciente',
                'msg' => $e->getMessage()
            ], 500);
        }
    }

    public function updatePatient(Request $request, $id_paciente)
    {
        $data = $request->json()->all();
        foreach ($data as $key => $value) {
            if ($key != "nome" && $key != "celular") return response()->json(['error' => 'Apenas o campo nome e celular podem ser alterados'], 422);
        }
        try {
            $pacientes = Paciente::find($id_paciente);
            if (!$pacientes) return response()->json(['error' => 'Paciente não encontrado'], 404);

            $pacientes->nome = $data['nome'];
            $pacientes->celular = $data['celular'];
            $pacientes->save();

            return response()->json($pacientes, 200);
        } catch (\Throwable $e) {
            return response()->json([
                'error' => 'Erro ao listar os pacientes',
                'msg' => $e->getMessage()
            ], 500);
        }
    }
}
