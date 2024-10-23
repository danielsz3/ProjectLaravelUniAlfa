<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studant extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cpf',
        'ra',
        'nascimento',
        'sala_id' // Adiciona o campo sala_id
    ];

    // Relacionamento com a sala
    public function sala()
    {
        return $this->belongsTo(Classroom::class);
    }
}
