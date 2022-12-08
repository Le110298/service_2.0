<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coor_serv extends Model
{
    use HasFactory;
    protected $fillable = ['serv_id','empl_id','turn','val_asig'];
}
