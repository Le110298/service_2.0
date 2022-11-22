<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empre extends Model
{
    use HasFactory;
    protected $fillable = ['Nombre_emp','dir_emp','direc_emp','rfc','tel'];
}
