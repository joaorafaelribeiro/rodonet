<?php

namespace App\Http\Controllers;

use App\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PessoaController extends Controller
{
    public function list(Request $request) {
        $q = $request->get('q');
        return Pessoa::where('nome','like','%'.$q.'%')->select(['id',DB::raw("CONCAT(cpf,' - ',nome) as text")])->paginate();
    }
}
