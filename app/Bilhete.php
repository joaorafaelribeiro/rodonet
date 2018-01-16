<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Bilhete extends Model
{
    public function pessoa() {
        return $this->belongsTo('App\Pessoa');
    }
    public function assento() {
        return $this->belongsTo('App\Assento');
    }
    public function viagem() {
        return $this->belongsTo('App\Viagem','viagem_id');

    }

    public static function hoje() {
        return DB::table('bilhetes')->whereDay('data',date('j'))->whereMonth('data',date('n'))->whereYear('data',date('Y'))->count();
    }

}
