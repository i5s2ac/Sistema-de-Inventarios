<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


// app/Models/Empleado.php
class Empleado extends Model
{
    protected $fillable = [
        'name',
        'departamento_id',
        'dpi',
        'fecha_de_nacimiento',
        'genero',
        'estado_civil',
        'email',
        'telefono',
        'direccion',
        'departamento',
        'municipio',
        'codigo_postal',
        'pais',
        'puesto',
        'salario',
        'tipo_contrato',
        'contacto_emergencia1',
        'contacto_emergencia2'
    ];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }
}
