<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assento extends Model
{
    public $fillable = ['nome','janela','veiculo_id'];
    public $timestamps = false;

}
