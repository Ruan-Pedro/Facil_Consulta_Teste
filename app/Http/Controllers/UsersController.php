<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function profile(Request $request)
    {
        //Retorna o usuário logado
        return response()->json([
            'usuario' => $request->user()
        ], 200);
    }
}
