<?php

namespace App\Models;

use App\Models\User;
use App\Models\Salario;
use App\Models\Candidato;
use App\Models\Categoria;
use App\Models\Ubicacion;
use App\Models\Experiencia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vacante extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo', 'categoria_id', 'experiencia_id',
        'ubicacion_id', 'salario_id', 'descripcion', 'imagen', 'skills', 'activa'
    ];

    //relacion 1 a 1 categoria y vacante
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    //relacion 1 a 1 salario y vacante
    public function salario()
    {
        return $this->belongsTo(Salario::class);
    }

    //relacion 1 a 1 ubicacion y vacante
    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class);
    }

    //relacion 1 a 1 experiencia y vacante
    public function experiencia()
    {
        return $this->belongsTo(Experiencia::class);
    }

    //relacion 1 a 1 recrutador y vacante
    public function reclutador()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    //relacion 1 a n (una vacante puede tener varios candidatos)
    public function candidatos()
    {
        return $this->hasMany(Candidato::class);
    }
}
