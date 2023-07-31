<?php

namespace App\Http\Controllers;

use App\Models\Cidades;

class CidadesController extends Controller
{
    public function getAll()
    {
        try {
            $cidades = Cidades::all();
            return response()->json($cidades,200);
        } catch (\Throwable $e) {
            return response()->json([
                'error' => 'Erro carregar as cidades',
                'msg' => $e->getMessage()
            ], 500);
        }
    }
}
