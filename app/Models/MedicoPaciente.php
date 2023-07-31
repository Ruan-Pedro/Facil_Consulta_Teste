<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicoPaciente extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'medico_paciente';
    protected $fillable = ['medico_id', 'paciente_id'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function medico()
    {
        return $this->belongsTo(Medico::class);
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
}
