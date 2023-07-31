<?php

namespace App\Http\Controllers;

use App\Models\Cidades;
use Illuminate\Http\Request;

class CidadesController extends Controller
{
    public function getAll()
    {
        try {
            $cidades = Cidades::all();
            return response()->json($cidades);
        } catch (\Throwable $e) {
            return "Erro carregar as cidades" . $e->getMessage();
        }
    }
}
