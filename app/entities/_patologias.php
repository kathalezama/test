<?php

namespace App\entities;

use Illuminate\Database\Eloquent\Model;

class _patologias extends Model {
    protected $table = 'patologias';
  
    protected $fillable = [
        'id', 'patologia'
    ];
}