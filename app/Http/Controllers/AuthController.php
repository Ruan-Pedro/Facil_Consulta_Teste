<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        //Necessário passar email e senha cadastrado após usar o seed de usuário
        $credentials = $request->json()->all();
        try {
            //Validação das credenciais
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'error' => 'Não autorizado'
                ], 401);
            }
        } catch (JWTException $e) {
            return response()->json([
                'error' => 'Falha ao criar token',
                'msg' => $e->getMessage()
            ], 500);
        }
        return response()->json(['token' => $token], 200);
    }

    public function logout()
    {
        auth()->logout();
        return response()->json([
            'message' => 'Successfully logged out'
        ], 200);
    }
}
