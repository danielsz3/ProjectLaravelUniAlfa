<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studant extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'cpf', 'ra', 'nascimento', 'sala_id'];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'sala_id');
    }
}
