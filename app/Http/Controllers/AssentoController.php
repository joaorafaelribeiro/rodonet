<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Viagem;
use Illuminate\Support\Facades\DB;


class AssentoController extends Controller
{
    public function list(Request $request) {
        $id = $request->get('q');
        if(!$id) {
            return [];
        }
        $viagem = Viagem::find($id);
        return $viagem->veiculo->assentos->pluck('nome','id')->toArray();
    }
}
