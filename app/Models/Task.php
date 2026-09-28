<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'titulo',
        'descripcion',
        'prioridad',
        'estado',
        'fecha',
        'categoria',
        'user_id',
    ];
    public function user()
{
    return $this->belongsTo(User::class);
   }
}

