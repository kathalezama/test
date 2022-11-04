<?php

namespace App\entities;

use Illuminate\Database\Eloquent\Model;

class _pacientes extends Model {
    protected $table = 'pacientes';
  
    protected $fillable = [
        'id', 'paciente'
    ];
}