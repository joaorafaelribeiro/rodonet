<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Motorista extends Model
{
    public $timestamps = false;
    use SoftDeletes;

    public function pessoa() {
        return $this->belongsTo('App\Pessoa');
    }
}
