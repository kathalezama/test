<?php

namespace App\entities;

use Illuminate\Database\Eloquent\Model;

class _citas extends Model {
    protected $table = 'citas';
  
    protected $fillable = [
        'id', 'id_paciente', 'id_doctor', 'fecha', 'hora', 'estatus'
    ];
}