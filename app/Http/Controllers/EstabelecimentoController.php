<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EstabelecimentoController extends Controller
{
    function index(){
        return view('estabelecimentos.listar');
    }

    public function __construct() {
        return $this->middleware('auth');
    }
}
