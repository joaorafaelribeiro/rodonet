<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Viagem extends Model
{
    public $table = 'viagens';

    protected $fillable = ['data','origem_id','destino_id','motorista_id','veiculo_id'];


    public function origem()
    {
        return $this->belongsTo(Parada::class, 'origem_id');
    }

    public function destino()
    {
        return $this->belongsTo(Parada::class, 'destino_id');
    }

    public function veiculo() {
        return $this->belongsTo('App\Veiculo');
        
    }
    
    public function motorista() {
        return $this->belongsTo('App\Motorista');
        
    }

}
