<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cidade;
use Illuminate\Support\Facades\DB;

class CidadeController extends Controller
{
    public function list(Request $request) {
        $estado = $request->get('q');

        return Cidade::where('estado',$estado)->get(['id', DB::raw('nome as text')]);
    }
}
