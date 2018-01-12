<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bilhete extends Model
{
    public function pessoa() {
        return $this->belongsTo('App\Pessoa');
    }
    public function viagem() {
        return $this->belongsTo('App\Viagem','viagem_id');

    }
}
