<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medico extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'medico';
    protected $fillable = ['nome', 'especialidade', 'cidade_id'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }
}
