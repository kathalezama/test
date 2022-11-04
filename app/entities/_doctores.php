<?php

namespace App\entities;

use Illuminate\Database\Eloquent\Model;

class _doctores extends Model {
    protected $table = 'doctores';
  
    protected $fillable = [
        'id', 'doctor', 'id_patologia'
    ];
}