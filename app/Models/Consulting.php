<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consulting extends Model
{
    protected $fillable = [ 
        'name',               // Nome
        'type_of_occurrence', // tipo ocorrencia
        'action_taken',       // ação tomada
        'description',        // descricao
        'cattle_id',          // Campo que será FK
        'image',              // Imagem
    ];
}


