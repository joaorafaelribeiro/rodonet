<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Viagem;

class IndexController extends Controller
{
    public function index() {
        return view('welcome',['viagens' => Viagem::all()]);
    }
}
