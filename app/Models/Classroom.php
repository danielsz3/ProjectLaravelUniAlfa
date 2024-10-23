<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', // Adicione os campos relevantes, por exemplo, nome da sala
    ];

    // Relacionamento com os estudantes
    public function studants()
    {
        return $this->hasMany(Studant::class, 'sala_id');
    }
}
