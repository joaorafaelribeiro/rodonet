<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pessoa extends Model
{
    use SoftDeletes;

    protected $fillable = ['id','cpf','rg','nome','data_nascimento','mae','pai','email','tel'];
}
