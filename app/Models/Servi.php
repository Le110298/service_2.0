<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servi extends Model
{
    public function empre(){ 
        return $this->belongsTo(Empre::class); 
    }
    use HasFactory;
    protected $fillable = ['Nombre_Servicio','empresID', 'Fecha','Hora','Ubicacion','Encargado','Cantida_Meseros','Precio','Observaciones'];
}
