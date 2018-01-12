<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    public $timestamps = false;

    public $fillable = ['placa','modelo','marca','ano','renavam','tipo_veiculo_id','tipo_combustivel_id','assento'];

    public function tipo() {
        return $this->belongsTo('App\TipoVeiculo','tipo_veiculo_id');
    }

    public function combustivel() {
        return $this->belongsTo('App\TipoCombustivel','tipo_combustivel_id');
    }

    public function assentos() {
        return $this->hasMany('App\Assento','veiculo_id');        
    }
}
