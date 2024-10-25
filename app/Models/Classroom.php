<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = ['nome']; // Adiciona os campos que podem ser preenchidos

    // Relacionamento com os estudantes (um para muitos)
    public function studants()
    {
        return $this->hasMany(Studant::class, 'sala_id');
    }
}
