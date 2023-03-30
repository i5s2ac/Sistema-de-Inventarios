<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/Departamento.php
class Departamento extends Model
{
    protected $fillable = ['name','descripcion','encargado'];

    public static $departamentos;

    public function empleados()
    {
        return $this->hasMany(Empleado::class);
    }
}


