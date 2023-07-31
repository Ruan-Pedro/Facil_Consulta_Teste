<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CidadesController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\MedicoPacienteController;

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('/ping', function () { //rota para testar se o servidor está funcionando
        return response()->json('pong');
    });

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/pacientes', [PacienteController::class, 'getAll']);
    Route::post('/pacientes', [PacienteController::class, 'insertPatient']);
    Route::put('/pacientes/{id_paciente}', [PacienteController::class, 'updatePatient']);

    Route::get('/medicos/{id_medico}/pacientes', [PacienteController::class, 'getPatientsByDoctor']);
    Route::post('/medicos', [MedicoController::class, 'insertDoctor']);
    Route::post('/medicos/{id_medico}/pacientes', [MedicoPacienteController::class, 'linkPatientDoctor']);
});

// ROTAS SEM NECESSIDADE DE AUTENTICAÇÃO
Route::post('/login', [AuthController::class, 'login']);
Route::get('/cidades', [CidadesController::class, 'getAll']);
Route::get('/medicos', [MedicoController::class, 'getAll']);
Route::get('/cidades/{id_cidade}/medicos', [MedicoController::class, 'getDoctorsByCities']);

