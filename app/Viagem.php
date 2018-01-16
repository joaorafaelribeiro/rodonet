<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public static function disponiveis() {
        return Viagem::whereDate('data','>=',now())
        ->join('paradas as origem','origem.id','=','origem_id')
        ->join('paradas as destino','destino.id','=','destino_id')
        ->get(['viagens.id', DB::raw("CONCAT(data,' - ',origem.nome,' x ',destino.nome) as text")]);
    }

    public static function hoje() {
        return DB::table('viagens')->whereDay('data',date('j'))->whereMonth('data',date('n'))->whereYear('data',date('Y'))->count();
    }

}
