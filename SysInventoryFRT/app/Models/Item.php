<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        //'sku',
        'name',
        'description',
        'quantity',
        'acquisition_cost',
        'acquisition_date',
        'expiration_date',
        'storage_cost',
        'idEmployee',];
}
