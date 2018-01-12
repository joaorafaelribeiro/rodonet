<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Viagem;
use Illuminate\Support\Facades\DB;

class ViagemController extends Controller
{
    public function list(Request $request) {
        $q = $request->get('q');
        return Viagem::join('paradas as origem','origem.id','=','origem_id')->
        join('paradas as destino','destino.id','=','destino_id')->
        where('origem.nome','like','%'.$q.'%')->
        whereOr('destino.nome','like','%'.$q.'%')->
        select(['viagens.id',DB::raw("CONCAT(data,' - ',origem.nome,' x ',destino.nome) as text")])
        ->orderBy('data','desc')->paginate();
    }
}
