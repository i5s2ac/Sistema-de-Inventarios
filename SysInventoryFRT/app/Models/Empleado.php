<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


// app/Models/Empleado.php
class Empleado extends Model
{
    protected $fillable = ['name', 'detail', 'departamento_id'];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }
}


