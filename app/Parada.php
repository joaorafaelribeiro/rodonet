<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parada extends Model
{
    public $table = 'paradas';
    public $timestamps = false;
    protected $fillable = ['nome','estado_id','cidade_id','lat','lng'];
    
}
